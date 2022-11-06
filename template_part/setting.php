
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<div class="container">
  <h2>Page Settings</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#footer">Footer Setting</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Social Setting</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="footer" class="container tab-pane active"><br>
        <h3>Footer Setting</h3>
        <form method="POST" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>
                        <label for="address">Address</label> 
                    </th>
                    <td>
                        <input type="text" name="address" value="<?= isset(get_option("theme_footer_settings")['address'])?get_option("theme_footer_settings")['address']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="contact_number">Contact Number</label> 
                    </th>
                    <td>
                        <input type="text" name="contact_number" value="<?= isset(get_option("theme_footer_settings")['contact_number'])?get_option("theme_footer_settings")['contact_number']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="email_address">Email Address</label> 
                    </th>
                    <td>
                        <input type="text" name="email_address" value="<?= isset(get_option("theme_footer_settings")['email_address'])?get_option("theme_footer_settings")['email_address']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="fb_link">Facebook Link</label> 
                    </th>
                    <td>
                        <input type="text" name="fb_link" value="<?= isset(get_option("theme_footer_settings")['fb_link'])?get_option("theme_footer_settings")['fb_link']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="fb_link">Header Image</label> 
                    </th>
                    <td>
					<input type="file" name="header_image" />
						<?php 
							if(isset(get_option("theme_footer_settings")['header_image'])){ ?>
								<img width="80px" src="<?= get_option("theme_footer_settings")['header_image'] ?>" alt="">
						<?php } ?>
                    </td>
                </tr>
            </table>
			<p>
				<input type="submit" value="Save settings" name="update_settings" class="button-primary"/>
			</p>
        </form>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    <h3>Social Setting</h3>
        <form method="POST" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>
                        <label for="address">Address</label> 
                    </th>
                    <td>
                        <input type="text" name="address" value="<?= isset(get_option("theme_footer_settings")['address'])?get_option("theme_footer_settings")['address']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="contact_number">Contact Number</label> 
                    </th>
                    <td>
                        <input type="text" name="contact_number" value="<?= isset(get_option("theme_footer_settings")['contact_number'])?get_option("theme_footer_settings")['contact_number']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="email_address">Email Address</label> 
                    </th>
                    <td>
                        <input type="text" name="email_address" value="<?= isset(get_option("theme_footer_settings")['email_address'])?get_option("theme_footer_settings")['email_address']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="fb_link">Facebook Link</label> 
                    </th>
                    <td>
                        <input type="text" name="fb_link" value="<?= isset(get_option("theme_footer_settings")['fb_link'])?get_option("theme_footer_settings")['fb_link']:"" ?>" size="25" />
                    </td>
                </tr>
				<tr>
                    <th>
                        <label for="fb_link">Header Image</label> 
                    </th>
                    <td>
					<input type="file" name="header_image" />
						<?php 
							if(isset(get_option("theme_footer_settings")['header_image'])){ ?>
								<img width="80px" src="<?= get_option("theme_footer_settings")['header_image'] ?>" alt="">
						<?php } ?>
                    </td>
                </tr>
            </table>
			<p>
				<input type="submit" value="Save settings" name="update_settings" class="button-primary"/>
			</p>
        </form>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>

