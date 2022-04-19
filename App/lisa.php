<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="source/chatbot.css">

<!--END-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/nav-sidebar.php' ?>
    <!--END-->
    <div class="py-5">
    </div>
    <section class="msger py-5">
        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name">LISA</div>
                        <div class="msg-info-time">12:45</div>
                    </div>

                    <div class="msg-text">

                    </div>
                </div>
            </div>

            <div class="msg right-msg">
            </div>
        </main>

        <form class="msger-inputarea">
            <input type="text" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>
    <div style="height:200px;">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="source/js/lisa.js"></script>
    <!-- END -->
</body>

</html>