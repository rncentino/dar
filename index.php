<?php require("./config/config.php") ?>
<?php require("./includes/header.php"); ?>

<body>
  <div class="container mt-3">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./src/darlogo/logo.png" alt="Logo" width="70" /></a>

        <div class="dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./src/darlogo/user-1.jpg" alt="Avatar" class="rounded-circle" width="50" height="50" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <h6 class="text-center"><?php echo $_SESSION['email']; ?></h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item custom-outline" href="#"><i class="las la-user-edit"></i> Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo APPURL; ?>/auth/logout.php" class="btn btn-outline-success mx-3 mt-2 d-block">Logout</a>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="container custom-table-container">
    <div class="row justify-content-center">
      <h1>DAR SURVEY TEAM DMS</h1>
      <div class="border border-bottom mt-2 mb-4"></div>
      <div class="d-flex justify-content-between mb-4">
        <div>
          <h5>Manage Records</h5>
        </div>
        <div class="d-flex justify-content-between">
          <form class="d-flex ms-auto me-3">
            <div class="input-group">
              <input type="text" class="form-control custom-outline" placeholder="Search....." />
              <button type="button" class="btn custom-btn" aria-label="Search">
                <i class="las la-search"></i>
              </button>
            </div>
          </form>
          <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#addRecordModal">
            <i class="las la-plus"></i> Add Record
          </button>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>OTC/TCT</th>
              <th>Lot No</th>
              <th>ASP No</th>
              <th>Location</th>
              <th>Geodetic Engr.</th>
              <th>Date Approved</th>
              <th>Map</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

          
          
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRecordModalLabel">Add Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="index.php" id="addRecordForm" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="OCT_TCT_no" class="form-label">OTC/TCT No</label>
                <input type="text" class="form-control custom-outline" id="OCT_TCT_no" name="OCT_TCT_no" required>
              </div>
              <div class="mb-3">
                <label for="lot_no" class="form-label">Lot No</label>
                <input type="text" class="form-control custom-outline" id="lot_no" name="lot_no" required>
              </div>
              <div class="mb-3">
                <label for="ASP_no" class="form-label">ASP No</label>
                <input type="text" class="form-control custom-outline" id="ASP_no" name="ASP_no" required>
              </div>
              <div class="mb-3">
                <label for="survey_no" class="form-label">Survey No</label>
                <input type="text" class="form-control custom-outline" id="survey_no" name="survey_no" required>
              </div>
              <div class="mb-3">
                <label for="sheet_no" class="form-label">Sheet No</label>
                <input type="text" class="form-control custom-outline" id="sheet_no" name="sheet_no" required>
              </div>
              <hr>
              <div class="mb-3">
                <label for="pdf_map" class="form-label">PDF Map</label>
                <input type="file" class="form-control custom-outline" id="pdf_map" name="pdf_map" required>
              </div>
              <div class="mb-3">
                <label for="kml_map" class="form-label">KML Map</label>
                <input type="file" class="form-control custom-outline" id="kml_map" name="kml_map" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="municipalitySelect" class="form-label">Municipality</label>
                <select class="form-select custom-outline" id="municipalitySelect">
                  <option value="" selected disabled>Choose a municipality</option>
                  <option value="Allen">Allen</option>
                  <option value="Biri">Biri</option>
                  <option value="Bobon">Bobon</option>
                  <option value="Capul">Capul</option>
                  <option value="Catarman">Catarman</option>
                  <option value="Catubig">Catubig</option>
                  <option value="Gamay">Gamay</option>
                  <option value="Lapinig">Lapinig</option>
                  <option value="Las Navas">Las Navas</option>
                  <option value="Lavezares">Lavezares</option>
                  <option value="LopeDeVega">Lope de Vega</option>
                  <option value="Mapanas">Mapanas</option>
                  <option value="Mondragon">Mondragon</option>
                  <option value="Palapag">Palapag</option>
                  <option value="Pambujan">Pambujan</option>
                  <option value="Rosario">Rosario</option>
                  <option value="San Antonio">San Antonio</option>
                  <option value="San Isidro">San Isidro</option>
                  <option value="San Jose">San Jose</option>
                  <option value="San Roque">San Roque</option>
                  <option value="San Vicente">San Vicente</option>
                  <option value="Silvino Lobos">Silvino Lobos</option>
                  <option value="Victoria">Victoria</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" class="form-control custom-outline" id="barangay" name="barangay" required>
              </div>
              <div class="mb-3">
                <label for="land_owner" class="form-label">Land Owner</label>
                <input type="text" class="form-control custom-outline" id="land_owner" name="land_owner" required>
              </div>
              <div class="mb-3">
                <label for="geodetic_engr" class="form-label">Geodetic Engr.</label>
                <input type="text" class="form-control custom-outline" id="geodetic_engr" name="geodetic_engr" required>
              </div>
              <div class="mb-3">
                <label for="area" class="form-label">Area</label>
                <input type="text" class="form-control custom-outline" id="area" name="area" required>
              </div>
              <hr>
              <div class="mb-3">
                <label for="date_approved" class="form-label">Date Approved</label>
                <input type="date" class="form-control custom-outline" id="date_approved" name="date_approved" required>
              </div>
            </div>
            <div class="mb-3">
              <button name="submit" type="submit" class="btn custom-btn" style="width: 100%;">Add Record</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

  <?php require("includes/footer.php"); ?>