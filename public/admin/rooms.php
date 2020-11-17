<?php
  include("./includes/header.php");
?>

      <section class="content">
        <div class="text-danger">
        This table fields should be modified to match with the sql table(don't include the image field for now)
        Imp ones are check in date, check out date like that. Amenities is not imp (What you feel add).
        </div>
        <table
          id="dtVerticalScrollExample"
          class="table table-striped table-bordered small"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="th-sm">Id.</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Type</th>
              <th class="th-sm">Featured</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Booked</th>
              <th class="th-sm">Check_in</th>
              <th class="th-sm">Check_out</th>
              <th class="th-sm">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
            </tr>
          </tbody>
        </table>
      </section>


    <?php include("./includes/footer.php");