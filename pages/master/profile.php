<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Account Settings </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h1 class="card-header">General Information</h1>
    <div class="card-body">
        <form id="form" data-parsley-validate="" novalidate="">
            <div class="row g-5 align-items-center ">
                <div class="profile-image mb-3 col-md-4"><img src="#" class="rounded-circle" alt="">
                <img src="../assets/images/s-1.jpg" width="100px">
                    <input type="file" id="input-file-max-fs" class="dropify mt-2">
                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                </div>
                <div class="form-group col-md-8">
                    <label for="inputEmail2" class="col-3 col-lg-6 col-form-label text-left">First Name</label>
                    <input type="text" class="form-control mb-4" id="firstName" placeholder="Name">

                    <label for="inputPassword2" class="col-3 col-lg-6 col-form-label text-left">Last Name</label>
                    <input type="text" class="form-control mb-4" id="lastName" placeholder="Last Name">

                    <label for="inputWebSite" class="col-3 col-lg-6 col-form-label text-left">Profession</label>
                    <input type="text" class="form-control mb-4" id="profession" placeholder="Profe">
                </div>
            </div>
            <div class="col-lg-20">
                <p class="text-right">
                    <button type="submit" class="btn btn-gradient-primary mb-4 float-right btn-rounded">Save</button>
                </p>
            </div>
        </form>
    </div>
</div>
<!-- ============================================================== -->
<!-- basic form -->
<!-- ============================================================== -->
<div class="col-sm-12">
    <div class="card">
        <h1 class="card-header">Contact</h1>
        <div class="card-body">
            <form action="#" id="basicform" data-parsley-validate="">
                <div class="form-group">
                    <label for="address">ADDRESS</label>
                    <input type="text" class="form-control mb-4" id="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="telephone">Phone</label>
                    <input type="text" class="form-control mb-4" id="phone" placeholder="your number">
                </div>
                <div class="form-group">
                    <label for="telephone">Website</label>
                    <input type="text" class="form-control mb-4" id="phone" placeholder="your website">
                </div>
                <div class="form-group">
                    <label for="telephone">Location</label>
                    <input type="text" class="form-control mb-4" id="phone" placeholder="your location">
                </div>
                <div class="col-lg-17">
                    <p class="text-right">
                        <button type="submit" class="btn btn-gradient-primary mb-4 float-right btn-rounded">Save</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end basic form -->
<!-- ============================================================== -->