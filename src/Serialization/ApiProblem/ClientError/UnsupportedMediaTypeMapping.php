<?php

declare(strict_types=1);

namespace Chubbyphp\ApiHttp\Serialization\ApiProblem\ClientError;

use Chubbyphp\ApiHttp\ApiProblem\ClientError\UnsupportedMediaType;
use Chubbyphp\ApiHttp\Serialization\ApiProblem\AbstractApiProblemMapping;
use Chubbyphp\Serialization\Mapping\NormalizationFieldMappingBuilder;
use Chubbyphp\Serialization\Mapping\NormalizationFieldMappingInterface;

final class UnsupportedMediaTypeMapping extends AbstractApiProblemMapping
{
    public function getClass(): string
    {
        return UnsupportedMediaType::class;
    }

    /**
     * @return array<int, NormalizationFieldMappingInterface>
     */
    public function getNormalizationFieldMappings(string $path): array
    {
        $fieldMappings = parent::getNormalizationFieldMappings($path);

        $fieldMappings[] = NormalizationFieldMappingBuilder::create('mediaType')->getMapping();
        $fieldMappings[] = NormalizationFieldMappingBuilder::create('supportedMediaTypes')->getMapping();

        return $fieldMappings;
    }
}
