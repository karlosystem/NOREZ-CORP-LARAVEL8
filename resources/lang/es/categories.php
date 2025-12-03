<?php
/*
language : Indonesia
*/
return [
  'title' => [
    'index' => 'Categorias',
    'create' => 'Agregar',
    'edit' => 'Editar',
    'detail' => 'Detalles',
  ],
  'label' => [
    'no_data' => [
      'fetch' => "Data kategori belum ada",
      'search' => "Kategori :keyword tidak ditemukan",
    ]
  ],
  'form_control' => [
    'input' => [
      'title' => [
        'label' => 'Titulo',
        'placeholder' => 'Ingrese el titulo',
        'attribute' => 'titulo'
      ],
      'slug' => [
        'label' => 'Ruta',
        'placeholder' => 'Ingrese el slug',
        'attribute' => 'slug'
      ],
      'thumbnail' => [
        'label' => 'Imagen',
        'placeholder' => 'Ingrese la imagen',
        'attribute' => 'imagen'
      ],
      'search' => [
        'label' => 'Buscar',
        'placeholder' => 'Buscar Categoria',
        'attribute' => 'buscar'
      ]
    ],
    'select' => [
      'parent_category' => [
        'label' => 'Seleccionar Categoria',
        'placeholder' => 'Elegir Categoria',
        'attribute' => 'elegir categoria'
      ]
    ],
    'textarea' => [
      'description' => [
        'label' => 'Descripcion',
        'placeholder' => 'Ingresar Descripcion',
        'attribute' => 'descripcion'
      ],
    ]
  ],
  'button' => [
    'create' => [
      'value' => 'Agregar'
    ],
    'save' => [
      'value' => 'Guardar'
    ],
    'edit' => [
      'value' => 'Editar'
    ],
    'delete' => [
      'value' => 'Eliminar'
    ],
    'cancel' => [
      'value' => 'Cancelar'
    ],
    'browse' => [
      'value' => 'Examinar'
    ],
    'back' => [
      'value' => 'Regresar'
    ],
  ],
  'alert' => [
    'create' => [
      'title' => "Tambah kategori",
      'message' => [
        'success' => "Kategori berhasil disimpan.",
        'error' => "Terjadi kesalahan saat menyimpan kategori. :error"
      ]
    ],
    'update' => [
      'title' => 'Ubah kategori',
      'message' => [
        'success' => "Kategori berhasil diperbaharui.",
        'error' => "Terjadi kesalahan saat perbarui kategori. :error"
      ]
    ],
    'delete' => [
      'title' => 'Hapus kategori',
      'message' => [
        'confirm' => "Yakin akan menghapus kategori :title ?",
        'success' => "Kategori berhasil dihapus",
        'error' => "Terjadi kesalahan saat menghapus kategori. :error"
      ]
    ],
  ]
];
