<?php 
	include 'inc/header.php';
?>
    <div class="lienhe">
        <div class="title_style text-center my-5">
            <h3>LIÊN HỆ</h3>
        </div>
        <div class="thongtinlienhe mt-4 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.129557166617!2d106.66064765804977!3d10.80138794801173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529309a1b98bf%3A0x5d9fe06f46cc5c31!2zQ8OUTkcgVFkgQ-G7lCBQSOG6pk4gVFJVWeG7gE4gVEjDlE5HIENJUCBNRURJQQ!5e0!3m2!1svi!2s!4v1592364781352!5m2!1svi!2s"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-3">
                        <div class="formDangki ml-lg-4">
                            <form method="POST" action="">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Họ và Tên *"
                                        aria-label="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Số điện thoại *"
                                        aria-label="Sdt">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email *" aria-label="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" required="" placeholder="Nội dung *"
                                        style="height: auto;"></textarea>
                                </div>
                                <button>GỬI</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
	include 'inc/footer.php';
?>