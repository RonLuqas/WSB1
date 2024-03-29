<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eWallet demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Pasek nawigacyjny -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="https://www.kadencewp.com/wp-content/uploads/2020/10/alogo-2.svg" style="width:10%;">
            <a class="navbar-brand" href="#">eWallet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Zaliczenie</a></li>
                            <li><a class="dropdown-item" href="#">Akcja1</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Akcja2</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Niedostepne</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Zawartość strony -->
    <div class="container-fluid mt-4">
        <ul class="list-group mb-3">
            <!-- Saldo początkowe -->
            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:lightgrey;">
                Initial account balance
                <span class="badge bg-primary rounded-pill">15600 PLN</span>
            </li>

            <?php
            $accountBalance = 15600;
            $transfersArray = array(300,-200,-400,-15600,634,553,-51 ,-1400,-1000);

            foreach ($transfersArray as $transfer) {
                $transferType = $transfer > 0 ? "Incoming" : "Outgoing";
                $badgeType = $transfer > 0 ? "bg-success" : "bg-danger";
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                echo $transferType." transfer";
                echo "<span class='badge $badgeType rounded-pill'>$transfer PLN</span>";
                echo "</li>";
                $accountBalance += $transfer;
            }

            $finalBadgeType = $accountBalance >= 0 ? "bg-green" : "bg-purple";
            ?>

            
            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:cyan;">
                Final account balance
                <span class="badge <?php echo $finalBadgeType; ?> rounded-pill">
                <?php echo $accountBalance; ?> PLN</span>
            </li>
        </ul>

        <?php if ($accountBalance < 0): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                You have an overdraft!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($accountBalance < 0 && abs(array_sum($transfersArray)) > 1000): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Your expenses exceeded incomes!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>