<?php 
    include('../scripts/auth/session.php');
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Impressum</title>
    <?php include_once ('../scripts/load/loadCss.php');
    ?>
</head>

<body>
<?php 
  include('../scripts/nav/menue.php');
  ?>
    <div class="container-fluid">
    <div class="box1">
        <h1 class="mb-4">Impressum</h1>

        <div class="mt-4">
            <table class="table">
                <tr>
                    <th>
                        <h2>Verantwortlich für den Inhalt:</h2>
                        <p>Dittrich Erik <br>
                            Langestraße 123<br>
                            0664 123 456 789<br>
                            <a href="mailto:email@this.email.com">email@this.email.com</a>
                        </p>
                    </th>
                    <th>
                        <img src="../res/pictures/PXL_20220623_105750104.jpg" class="img-fluid" style="max-width: 90px;" alt="Dittrich Erik">
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Kovacevic Michael <br>
                            Kurzestraße 123<br>
                            0660 987 654 321<br>
                            <a href="mailto:this@email.email.com">email@this.email.com</a>
                        </p>
                    </th>
                    <th>
                        <img src="../res/pictures/20240115_171619.jpg" class="img-fluid" style="max-width: 90px;" alt="Kovacevic Michael">
                    </th>
                </tr>
            </table>
        </div>

        <div class="box mt-4">
            <h2>Hotelkontakt:</h2>
            <p>Billton<br>
                Billtonstraße 345<br>
                0699 123 456 789<br>
                <a href="mailto:billton@billton.com">billton@billton.com</a><br>
                billton.com
            </p>
        </div>

        <div class="box mt-4">
            <h2>Firmenbuchnummer:</h2>
            <p>FN 123456a</p>
        </div>

        <div class="box mt-4">
            <h2>UID-Nummer:</h2>
            <p>ATU12345678</p>
        </div>

        <div class="box mt-4">
            <h2>Mitglied bei:</h2>
            <p>Wko<br>
                Schwarzenbergplatz 4<br>
                1030 Wien
            </p>
        </div>

        <div class="box mt-4">
            <h2>Versicherung:</h2>
            <p>Österreichische Haftpflichtversicherung<br>
                Versicherungstraße 327
            </p>
        </div>

        <div class="box mt-4">
            <h2>Urheberrecht und Bildnachweise:</h2>
            <p>Alle Bilder und Grafiken dieser Website gehören ausschließlich Billton.
            </p>
        </div>

        <div class="box mt-4">
            <h2>Haftung für Links:</h2>
            <p>Unsere Website enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei bekannt werden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.
            </p>
        </div>

        <div class="box mt-4">
            <h2>Streitschlichtung:</h2>
            <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a href="https://ec.europa.eu/consumers/odr">https://ec.europa.eu/consumers/odr</a>. Unsere E-Mail-Adresse finden Sie oben im Impressum. Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.
            </p>
        </div>

        <div class="box mt-4">
            <h2>Datenschutz:</h2>
            <p>Informationen zur Verarbeitung personenbezogener Daten finden Sie in unserer Datenschutzerklärung.
            </p>
        </div>
    </div>
</div>
</body>

</html>