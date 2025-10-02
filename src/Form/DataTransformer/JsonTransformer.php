<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Handles transforming JSON to array and backward
 */
class JsonTransformer implements DataTransformerInterface
{

//    /**
//     * @inheritDoc
//     */
//    public function reverseTransform($value): mixed
//    {
//        if (empty($value)) {
//            return [];
//        }
//
//        return json_decode($value);
//    }
//
//    /**
//     * @ihneritdoc
//     */
//    public function transform($value): mixed
//    {
//        if (empty($value)) {
//            return json_encode([]);
//        }
//
//        return json_encode($value);
//    }

    /**
     * @inheritDoc
     */
    public function transform($value): mixed
    {
        if (!is_array($value) || empty($value)) {
            return '{}';
        }
        return json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @inheritDoc
     */
    public function reverseTransform($value): mixed
    {
        if ($value === null || $value === '') {
            return [];
        }

        $decoded = json_decode($value, true);
        if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new TransformationFailedException('JSON invalide.');
        }
        if (!is_array($decoded)) {
            throw new TransformationFailedException('Le JSON doit représenter un objet.');
        }

        return $decoded;
    }
}

