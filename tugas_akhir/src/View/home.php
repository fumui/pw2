<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            min-height: 100vh;
        }

        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?=$config['base_path']?>/public/logo.svg" width="60" height="60" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($user)): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$config['base_path']?>/user/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="row navbar-light bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Most Popular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Most Downloaded</a>
                        </li>
                        <?php if (isset($user) && $user->getLevel() === 'ADMIN'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Book Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Category Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">User Management</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    </div>

    <?php if (isset($errMsg)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?=$errMsg?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h2>Categories</h2>
                <ul class="list-group">
                    <?php foreach ($categories as $category): ?>
                        <li class="list-group-item"><?= $category->getName(); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9 main-content">
                <h2>Books</h2>
                <div class="row">
                    <?php foreach ($books as $book): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $book->getTitle(); ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $book->getAuthor(); ?></h6>
                                    <p class="card-text"><?= $book->getSummary(); ?></p>
                                    <a href="<?= $book->getDownloadLink(); ?>" class="btn btn-primary">Download</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?=$config['base_path']?>/user/login">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?=$config['base_path']?>/user/register">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
