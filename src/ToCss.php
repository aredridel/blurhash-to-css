<?php

namespace aredridel\Blurhash;

use kornrunner\Blurhash\Blurhash;

class ToCss
{
	/** @var string */
	protected $hash;

	public function __construct(string $hash)
	{
		$this->hash = $hash;
	}

	public function toCss(): string
	{
		$pixels = Blurhash::decode($this->hash, 10, 10);

		$linearGradients = [];

		foreach ($pixels as $row) {
			$expanded = [];
			foreach ($row as $i => $pixel) {
				[$r, $g, $b] = $pixel;
				$rgb = sprintf("#%02x%02x%02x", $r, $g, $b);
				$start = $i === 0 ? "" : " " . ($i / count($row) * 100) . "%";
				$end = $i === count($row) ? "" : " " . ($i + 1) / count($row) * 100 . "%";
				$expanded[] = "$rgb$start$end";
			}
			$linearGradients[] = "linear-gradient(90deg, " . join(',', $expanded) . ")";
		}

		$backgroundPosition = [];
		for ($i = 0; $i < count($linearGradients); $i++) {
			$backgroundPosition[] = $i == 0 ? "0 0" : "0 " . round($i / (count($linearGradients) - 1) * 100) . '%';
		}

		$backgroundSize = "100% " . (100 / count($linearGradients)) . "%";

		return join(";\n", [
			"background-image: " . join(',', $linearGradients),
			"background-position: " . join(',', $backgroundPosition),
			"background-size: $backgroundSize",
			"background-repeat: no-repeat",
			"filter: blur(13px)",
			"transform: scale(1.3)"
		]);
	}
}
