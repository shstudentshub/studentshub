<?php
	function truncateString($string, $lengthLimit, $newLength) {
		if (count($string) > $lengthLimit) {
			return substr($string, 0 , $newLength)."...";
		} else {
			return $string;
		}
	}

	function stringifyApprovalStatus($status) {
		$stringStatus = "";
		switch ($status) {
			case 0:
				$stringStatus = "Pending";
				break;
			case 1:
				$stringStatus = "Approved";
				break;
			case 2:
				$stringStatus = "Declined";
				break;
			default:
				$stringStatus = "Unknown";
				break;
		}

		return $stringStatus;
	}