<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<style type="text/css">

  .boxed {
  border: 1px solid green ;
}
</style>
  <style type="text/css">

  table {
    table-layout: auto;
    border-collapse: collapse;
    width: 100%;
}
table td {
    border: 1px solid #ccc;
}
table .absorbing-column {
    width: 100%;
}

</style>
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p>State-of-the-art facilities available for users.<br>
        <table style="width:100%" class="absorbing-column">
  <tr>
    <th>Sr. No</th>
    <th>Name of the Instrument</th>
    <th>Make/Model</th>
    <th>Available options</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Hi-Resolution Transmission Electron Microscope (HRTEM)</td>
    <td>JEOL Japan,JEM-2100 Plus</td>
    <td>Imaging (TEM and HRTEM), SAED, EDXA, STEM</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Micro-Raman Spectrometer</td>
    <td>HORIBA France, LABRAM HR Evolution</td>
    <td>Raman spectroscopy and Imaging<br>
Lasers: <br>
785 nm, 633 nm, 532 nm
and 325 nm
</td>
  </tr>
  <tr>
    <td>3</td>
    <td>X-Ray Diffractometer (XRD)</td>
    <td>BRUKER USA D8 Advance, Davinci</td>
    <td>Powder and Thin film geometry.

<br>Small angle X-ray scattering (SAXS)
</td>
  </tr>
</table>
        </p>

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; SCIF</p>
        </footer>

      </div>
    </div>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
