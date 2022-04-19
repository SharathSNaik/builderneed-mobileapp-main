<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="../assets/widget.css">
<!--END-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/agent-sidebar.php' ?>
    <!--END-->
    <div class="py-2">
    </div>
    <div class="page-content-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 bg-white rounded">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">User</th>
                                <th scope="col">Assigned</th>
                                <th scope="col">Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center loadergif">
                                <td colspan="3">
                                    <img src="../assets/img/loader.gif" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/check-lead.js"></script>
    <script src="source/js/sales-lander.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>