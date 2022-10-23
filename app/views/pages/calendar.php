<?php require APPROOT . '/views/inc/header_new.php'; ?>
<style>
      .form-group input,
      .form-group textarea,
      .form-group select {
        padding: 10px;
        font-size: 14px;
      }

      #btn-add-ref {
        padding: 5px;
        margin-left: 10px;
        cursor: pointer;
        border-radius: 50%;
        transition: all 0.5s ease;
        box-shadow: 0 0 1px 1px grey;
      }
      #btn-add-ref:hover i {
        transform: scale(1.3);
      }

      .btn {
        font-size: 14px;
        padding: 10px;
        color: white;
        background-color: black !important;
        outline:none;
        border:none;
      }

      .btn:hover{
        color:white;
        outline:none;
        border:none;
      }
    </style>
   <main class="alumni forum">
      <div class="container bg-light p-5">
        <div id="calendar"></div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"
      integrity="sha256-7PzqE1MyWa/IV5vZumk1CVO6OQbaJE4ns7vmxuUP/7g="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css"
      integrity="sha256-jLWPhwkAHq1rpueZOKALBno3eKP3m4IMB131kGhAlRQ="
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"
      integrity="sha256-h/8r72lsgOmbQuoZKT6x3MwmqPIBN9rgiD23Bzgd2n4="
      crossorigin="anonymous"
    ></script>
    <script>
      
    </script>

    <script src="<?= URLROOT?>/js/EventManagement/index.js"></script>

    <?php require APPROOT . '/views/inc/footer_u.php'; ?>

