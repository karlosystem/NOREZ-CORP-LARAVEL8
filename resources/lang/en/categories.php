<?php
/*
language : English
*/
return [
  'title' => [
    'index' => 'Generos',
    'create' => 'Add genero',
    'edit' => 'Edit genero',
    'detail' => 'Detail genero',
  ],
  'label' => [
    'no_data' => [
      'fetch' => "No genero data yet",
      'search' => ":keyword genero not found",
    ]
  ],
  'form_control' => [
    'input' => [
      'title' => [
        'label' => 'Title',
        'placeholder' => 'Enter title',
        'attribute' => 'title'
      ],
      'slug' => [
        'label' => 'Slug',
        'placeholder' => 'Auto generate',
        'attribute' => 'slug'
      ],
      'thumbnail' => [
        'label' => 'Thumbnail',
        'placeholder' => 'Browse thumbnails',
        'attribute' => 'thumbnail'
      ],
      'search' => [
        'label' => 'Search',
        'placeholder' => 'Search for Generos',
        'attribute' => 'search'
      ]
    ],
    'select' => [
      'parent_category' => [
        'label' => 'Parent genero',
        'placeholder' => 'Choose parent genero',
        'attribute' => 'parent genero'
      ]
    ],
    'textarea' => [
      'description' => [
        'label' => 'Description',
        'placeholder' => 'Enter description',
        'attribute' => 'description'
      ],
    ]
  ],
  'button' => [
    'create' => [
      'value' => 'Add'
    ],
    'save' => [
      'value' => 'Save'
    ],
    'edit' => [
      'value' => 'Edit'
    ],
    'delete' => [
      'value' => 'Delete'
    ],
    'cancel' => [
      'value' => 'Cancel'
    ],
    'browse' => [
      'value' => 'Browse'
    ],
    'back' => [
      'value' => 'Back'
    ],
  ],
  'alert' => [
    'create' => [
      'title' => 'Add genero',
      'message' => [
        'success' => "genero saved successfully.",
        'error' => "An error occurred while saving the genero. :error"
      ]
    ],
    'update' => [
      'title' => 'Edit genero',
      'message' => [
        'success' => "genero updated successfully.",
        'error' => "An error occurred while updating the genero. :error"
      ]
    ],
    'delete' => [
      'title' => 'Delete genero',
      'message' => [
        'confirm' => "Are you sure you want to delete the :title genero?",
        'success' => "genero deleted successfully.",
        'error' => "An error occurred while deleting the genero. :error"
      ]
    ],
  ]
];
