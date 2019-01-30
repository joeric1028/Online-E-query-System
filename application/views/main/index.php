<h1>Welcome, JV Ty!</h1>

<div class="card">
  <div class="card-body">
    <section>
      <!--for demo wrap-->
      <h3>Sample Table</h3>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>Code</th>
              <th>Company</th>
              <th>Price</th>
              <th>Change</th>
              <th>Change %</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <tr>
              <td>AAC</td>
              <td>AUSTRALIAN COMPANY </td>
              <td>$1.38</td>
              <td>+2.01</td>
              <td>-0.36%</td>
            </tr>
            <tr>
              <td>AAD</td>
              <td>AUSENCO</td>
              <td>$2.38</td>
              <td>-0.01</td>
              <td>-1.36%</td>
            </tr>
            <tr>
              <td>AAX</td>
              <td>ADELAIDE</td>
              <td>$3.22</td>
              <td>+0.01</td>
              <td>+1.36%</td>
            </tr>
            <tr>
              <td>XXD</td>
              <td>ADITYA BIRLA</td>
              <td>$1.02</td>
              <td>-1.01</td>
              <td>+2.36%</td>
            </tr>
            <tr>
              <td>AAC</td>
              <td>AUSTRALIAN COMPANY </td>
              <td>$1.38</td>
              <td>+2.01</td>
              <td>-0.36%</td>
            </tr>
            <tr>
              <td>AAD</td>
              <td>AUSENCO</td>
              <td>$2.38</td>
              <td>-0.01</td>
              <td>-1.36%</td>
            </tr>
            <tr>
              <td>AAX</td>
              <td>ADELAIDE</td>
              <td>$3.22</td>
              <td>+0.01</td>
              <td>+1.36%</td>
            </tr>
            <tr>
              <td>XXD</td>
              <td>ADITYA BIRLA</td>
              <td>$1.02</td>
              <td>-1.01</td>
              <td>+2.36%</td>
            </tr>
            <tr>
              <td>AAC</td>
              <td>AUSTRALIAN COMPANY </td>
              <td>$1.38</td>
              <td>+2.01</td>
              <td>-0.36%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>