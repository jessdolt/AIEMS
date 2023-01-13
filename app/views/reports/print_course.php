<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    />
    <!-- Bootstrap 5.1.3 CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
      media="screen,print"
    />
    <!-- FontAwesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      media="screen,print"
    />
    <link href="main.css" media="all" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css"
      media="screen,print"
    />

    <style>
      @media print {
        .table thead tr th {
          border-width: 1px !important;
          border-style: solid !important;
          border-color: black !important;
          font-size: 14.5px !important;
          background-color: black;
          padding: 1px;
          -webkit-print-color-adjust: exact;
        }

        .table tbody tr td {
          border-width: 1px !important;
          border-style: solid !important;
          border-color: black !important;
          font-size: 14.5px !important;
          background-color: black;
          padding: 0px;
          -webkit-print-color-adjust: exact;
        }
      }

      .table-reports {
        font-size: 10px;
      }

      .table-reports thead tr th {
        text-transform: uppercase;
        text-align: center;
        padding: 10px;
        font-weight: 600;
        border: 1px solid black;
      }

      .table-reports tbody tr td,
      .table-reports tfoot tr td {
        padding: 5px;
        border-left: 1px solid black;
        border-top: 1px solid black;
      }

      .table-reports {
        width: 100%;
        border-right: 1px solid black;
        border-bottom: 1px solid black;
      }
      .signatories {
        display: flex;
        width: 100%;
        border: 1px solid black;
        margin-top: 5px;
      }
      .signatory-box {
        flex: 1;
        border: 1px solid black;
        text-align: center;
        padding-bottom: 2px;
      }
      .signatory-box p {
        margin-bottom: 0;
        padding-top: 10px;
      }
      .signatory-box p,
      .signatory-box h6 {
        font-size: 12px;
      }
    </style>
  </head>

  <body>
    <input type="hidden" id="dateFrom" value="<?= $dateFrom ?>" />
    <input type="hidden" id="dateTo" value="<?= $dateTo ?>" />
    <input type="hidden" id="brCode" value="<?= $brCode ?>" />
    <input type="hidden" id="docType" value="<?= $docType ?>" />
    <div class="" id="element-to-print" style="padding: 0">
      <div class="col-xl-12">
        <div class="container-fluid">
          <div class="row">
            <div class="col-9">
            <img
                src="<?php echo URLROOT.'/uploads/'.$_SESSION['logo']?>"
                class="rounded float-left"
                width="75"
                alt="logo"
                srcset=""
              />
              <strong><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'] ;?></strong>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <h6 class="text-uppercase">ALUMNI REPORT AS OF <?php echo date("M d, Y")?></h6>
      </div>


      <?php foreach($data as $x) : ?>
      <div
        id="table-report-HEAD"
        class="pb-2 mt-3"
        style="font-size: 17px; font-weight: bold"
      >
        <?= $x['name']?> (<?= $x['courseCode'] ?>)
      </div>

      <div class="table-responsive">
         <?php foreach($x['data'] as $y):?>
        <div style="font-size: 12px; font-weight: bold">Batch <?= $y['year']?></div>
        <table class="table-reports">
          <thead id="summary-reports-tableHead">
                  <tr>
                    <th style="width: 25%">Student No.</th>
                    <th style="width: 15%">Last Name </th>
                    <th style="width: 20%">Name </th>
                    <th style="width: 10%">Course</th>
                    <th style="width: 15%">Status</th>
                    <th style="width: 15%">Date Responded</th>
                  </tr>
          </thead>
          <tbody id="summary-reports-table">
            <?php foreach($y['alumni'] as $a) :?>
              <tr>
                <td><?= $a->student_no?></td>
                <td><?= $a->last_name?> <?= !empty($a->auxiliary_name) ? $a->auxiliary_name : ''?></td>
                <td><?= $a->first_name?> <?= !empty($a->middle_name) ? substr($a->middle_name,0,1).'.' : ''?></td>
                <td><?= $x['courseCode']?></td>
                <td><?= !empty($a->status) ? $a->status : 'NA'?></td>
                <td><?= !empty($a->date_responded) ? $a->date_responded : 'NA'?></td>
              </tr>
            <?php endforeach;?>
          </tbody>
          <tfoot id="summary-reports-footer"></tfoot>
        </table>
        <?php if(empty($y['alumni'])) : ?>
                   <p style="font-size: 10px; text-align:center;"><?= 'No Records'?></p> 
            <?php endif;?>
        <?php endforeach;?>
      </div>

      <?php endforeach; ?>




      <div class="signatories">
        <div class="signatory-box">
          <h6>Prepared By:</h6>
          <p>Jess Roque</p>
        </div>
        <div class="signatory-box">
          <h6>Checked By:</h6>
          <p>Jess Roque</p>
        </div>
        <div class="signatory-box">
          <h6>Approved By:</h6>
          <p>Jess Roque</p>
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="public/js/shared.js"></script>

    <script src="reports-accounting/report_print.js" type="module"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
      var element = document.getElementById("element-to-print");
      var opt = {
        filename: `Summary_Report.pdf`,
        image: {
          type: "JPEG",
          quality: 1,
        },
        margin: 0.2,
        html2canvas: {
          scale: 5,
        },
        jsPDF: {
          unit: "in",
          format: "letter",
          orientation: "portrait",
        },
        pagebreak: {
          before: ".beforeClass",
          after: ["#after1", "#after2"],
        },
      };

      setTimeout(() => {
        html2pdf()
          .set(opt)
          .from(element)
          .toPdf()
          .get("pdf")
          .then(function (pdf) {
            var totalPages = pdf.internal.getNumberOfPages();
            for (i = 1; i <= totalPages; i++) {
              pdf.setPage(i);
              pdf.setFontSize(10);
              pdf.setTextColor(150);

              // The 10,200 value is only for A4 landscape. You need to define your own for other page sizes
              pdf.text(
                "Page " + i,
                pdf.internal.pageSize.getWidth() / 2.25,
                pdf.internal.pageSize.getHeight() - 1
              );
            }
            window.open(pdf.output("bloburl"), "_blank");
          });
      }, 1000);
    </script>
    <footer
      class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top"
    >
      <div class="col-md-4 d-flex align-items-center">
        <img src="public/images/plm.png" width="40" alt="" srcset="" />

        <span class="mb-3 mb-md-0 text-muted">© 2022 <?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'] ;?></span>
      </div>
    </footer>
  </body>
</html>
