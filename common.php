<?php
session_start();

// Initialise cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Multidimensional associative array – product catalog (9+ items)
$products = [
    1 => [
        'id'          => 1,
        'name'        => 'Traditional Basotho Blanket',
        'price'       => 350.00,
        'description' => 'Handwoven wool blanket featuring iconic Basotho patterns, perfect for home decor or as a gift.',
        'category'    => 'Textiles',
        'image'       => 'https://picsum.photos/id/1015/600/400'
    ],
    2 => [
        'id'          => 2,
        'name'        => 'Seshoeshoe Fabric',
        'price'       => 180.00,
        'description' => 'Vibrant printed fabric used for traditional Basotho dresses, high quality cotton.',
        'category'    => 'Textiles',
        'image'       => 'https://picsum.photos/id/133/600/400'
    ],
    3 => [
        'id'          => 3,
        'name'        => 'Mokorotlo Hat',
        'price'       => 120.00,
        'description' => 'Iconic straw hat symbolising Lesotho culture and heritage.',
        'category'    => 'Accessories',
        'image'       => 'https://picsum.photos/id/29/600/400'
    ],
    4 => [
        'id'          => 4,
        'name'        => 'Handcrafted Pottery Vase',
        'price'       => 90.00,
        'description' => 'Clay vase handmade by local Lesotho potters.',
        'category'    => 'Pottery',
        'image'       => 'https://picsum.photos/id/160/600/400'
    ],
    5 => [
        'id'          => 5,
        'name'        => 'Beaded Necklace',
        'price'       => 45.00,
        'description' => 'Traditional Basotho beaded necklace with vibrant colours.',
        'category'    => 'Jewelry',
        'image'       => 'https://picsum.photos/id/201/600/400'
    ],
    6 => [
        'id'          => 6,
        'name'        => 'Woven Grass Basket',
        'price'       => 65.00,
        'description' => 'Decorative and functional woven basket made from local grasses.',
        'category'    => 'Home Decor',
        'image'       => 'https://picsum.photos/id/251/600/400'
    ],
    7 => [
        'id'          => 7,
        'name'        => 'Leather Bracelet',
        'price'       => 30.00,
        'description' => 'Hand-stitched leather bracelet with traditional beadwork.',
        'category'    => 'Jewelry',
        'image'       => 'https://picsum.photos/id/1005/600/400'
    ],
    8 => [
        'id'          => 8,
        'name'        => 'Wooden Lion Carving',
        'price'       => 95.00,
        'description' => 'Hand-carved wooden lion figure representing Lesotho wildlife.',
        'category'    => 'Art',
        'image'       => 'https://picsum.photos/id/1015/600/400'
    ],
    9 => [
        'id'          => 9,
        'name'        => 'Traditional Decorative Spear',
        'price'       => 200.00,
        'description' => 'Miniature decorative spear inspired by Basotho traditions.',
        'category'    => 'Art',
        'image'       => 'https://picsum.photos/id/133/600/400'
    ]
];
?>