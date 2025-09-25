<?php

namespace App\Services;

use App\Model\OeuvreData;
use App\Services\OeuvreManager;
use App\Services\ValidatorManager;

class HandleSubmissionsManager {
    private OeuvreManager $oeuvreManager;
    private ValidatorManager $validatorManager;

    public function __construct() {
        $this->oeuvreManager = new OeuvreManager();
        $this->validatorManager = new ValidatorManager();
    }

    public function handleSubmission(array $postData): array {
        $oeuvreData = OeuvreData::fromArray($postData);
        $errors = $this->validatorManager->validateOeuvreData($oeuvreData);

        if (empty($errors)) {
            $this->oeuvreManager->saveOeuvre($oeuvreData);
        }
        return $errors;
    }
}
