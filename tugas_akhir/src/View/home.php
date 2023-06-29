<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <div class="sidebar">
        <h2>Categories</h2>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><?php echo $category->getName(); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="main-content">
        <h2>Books</h2>
        <ul>
            <?php foreach ($books as $book): ?>
                <li><?php echo $book->getTitle(); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
