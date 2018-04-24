<?php
    return [
        'video' => [
            'title' => 'GET /videos/:id.json',
            'desc'  => 'Returns a Video object'
        ],
        'videos' => [
            'title' => 'GET /videos.json',
            'desc'  => 'Returns a collection of Video objects'
        ],
        'encodings' => [
            'title' => 'GET /videos/:id/encodings.json',
            'desc'  => 'Returns a collection of Encoding objects connected to specified Video object',
        ],
        'metaData' => [
            'title' => 'GET /videos/:id/metadata.json',
            'desc'  => 'Just after the media is uploaded, we analyze and store the metadata that we can extract from it',
        ]
    ];
