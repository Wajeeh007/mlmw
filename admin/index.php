<?php require('includes/php/header.php'); ?>
<?php include('connect-db.php'); ?>

<div>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Dashboard</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="manage_lawyers.php?lawyer=lawyer">
            <i class="glyphicon glyphicon-user blue"></i>
            <div>Total Lawyers</div>
            <div><?php echo count_all_lawyers(); ?></div>
            <span class="notification"><?php echo find_total_zero_status_lawyers(); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="manage_clients.php?client=client">
            <i class="glyphicon glyphicon-star green"></i>
            <div>Total Clients</div>
            <div><?php echo count_all_clients(); ?></div>
            <span class="notification green"><?php echo find_total_zero_status_clients(); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="manage_cases.php?case=case">
            <i class="glyphicon glyphicon-folder-open yellow"></i>
            <div>Total Cases</div>
            <div><?php echo find_total_cases(); ?></div>
            <span class="notification yellow">&copy;</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="manage_courts.php?court=court">
            <i class="glyphicon glyphicon-list-alt red"></i>
            <div>Total Courts</div>
            <div><?php echo find_total_courts(); ?></div>
            <span class="notification red">&copy;</span>
        </a>
    </div>
</div>

<!-- Row 2 -->
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="view-admins.php?vie=vie">
            <i class="glyphicon glyphicon-user blue"></i>
            <div>Total Admins</div>
            <div><?php echo count_all_admins(); ?></div>
            <span class="notification">&copy;</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="news.php?view=view">
            <i class="glyphicon glyphicon-star green"></i>
            <div>Total News</div>
            <div><?php echo count_all_news(); ?></div>
            <span class="notification green">&copy;</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="notifications.php?view=view">
            <i class="glyphicon glyphicon-bell yellow"></i>
            <div>Total Notifications</div>
            <div><?php echo count_all_notifications(); ?></div>
            <span class="notification yellow">&copy;</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" href="#">
            <i class="glyphicon glyphicon-download-alt red"></i>
            <div>Downloads</div>
            <div>25</div>
            <span class="notification red">12</span>
        </a>
    </div>
</div>

<!-- Introduction Section -->
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Introduction to My Lawyer My Way</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>Admin Area <br><small>Manage News, Cases, Clients, Courts, and Team</small></h1>
                    <p>This is the live demo of My Lawyer My Way. It helps lawyers and clients manage their cases and appointments easily.</p>
                    <p><b>All menu pages are fully functional. Mobile app download is available on the download page.</b></p>
                    <p class="center-block download-buttons">
                        <a href="../index.php" target="_blank" class="btn btn-primary btn-lg">
                            <i class="glyphicon glyphicon-chevron-right glyphicon-white"></i> Visit Site
                        </a>
                        <a href="../mobileapp.php" class="btn btn-danger btn-lg">
                            <i class="glyphicon glyphicon-download-alt"></i> Download Page
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('includes/php/footer.php'); ?>
