<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Website Resmi PMB Online <?=config('nama_sekolah');?> Tahun <?=config('ppdb_tahun');?></h3>
           </div>
       </div>
       <div class="row-fluid">
           <div class="span9">
               <div class="widget">
                   <div class="widget-title">
                       <h4><i class="icon-home"></i> <?=$title;?></h4>
                   </div>
                   <div class="widget-body">
                       <?php if ($query->num_rows() > 0) { foreach ($query->result() as $row) { ?>
                       
                       <div class="row-fluid blog">
                           <div class="span12 news">
                               <h4><?=$row->post_title;?></h4>
                               <p class="text-warning"><i class="icon-sitemap"></i> <?=$row->cat_name;?>&nbsp;&nbsp;&nbsp;<i class="icon-calendar"></i> <?=indo_date($row->post_date);?>&nbsp;&nbsp;&nbsp;<i class="icon-user"></i> <?=$row->user_display;?></p>
                               <?=$row->post_content;?>
                           </div>
                       </div>
                       <div class="space20"></div>
                       <?php } } ?>
                       
                       <?php if ($num_rows > 5) { ?>
                       <div class="pagination pagination-centered">
                          <ul>
                             <?=$pagination;?>
                          </ul>
                       </div>
                       <?php } ?>
                    </div>
                 </div>
              </div>
              <div class="span3">
                 <div class="blog-side-bar">
                    <?php if ($category->num_rows() > 0) { ?>
                    <h2>Kumpulan Artikel</h2>
                    <ul class="unstyled">
                         <?php foreach ($category->result() as $cat) { ?>
                         <li>
                            <?=anchor('post/category/'.$cat->cat_id, '<i class="icon-chevron-right"></i>'.$cat->cat_name);?>
                         </li>
                         <?php } ?>
                    </ul>
                    <hr>
                    <?php } ?>

                    <?php 
                    if ($archives->num_rows() > 0)
                    {
                        echo '<h2>ARSIP '.date('Y').'</h2>';
                        echo '<ul class="unstyled">';
                        foreach ($archives->result() as $archive)
                        {
                            echo '<li>';
                            echo anchor('post/archives/'.$archive->bulan, '<i class="icon-chevron-right"></i> '.bulan($archive->bulan));
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '<hr>';
                    }
                    ?>

                    <?php 
                    if ($link_category->num_rows() > 0)
                    {
                        foreach ($link_category->result() as $l_category)
                        {
                            $link = $this->m_link->find_by_category($l_category->cat_id);
                            if ($link->num_rows() > 0)
                            {
                                echo '<h2>'.$l_category->cat_name.'</h2>';
                                echo '<ul class="unstyled">';
                                foreach ($link->result() as $l)
                                {
                                    echo '<li>'.anchor($l->link_url, '<i class="icon-chevron-right"></i> '.$l->link_name, array('target' => '_blank')).'</li>';
                                }
                                echo '</ul>';
                            }
                        }
                    }
                    ?>
                    <h2>Support By</h2>
                    <ul class="unstyled">
                        <li><a href="http://websitesekolahgratis.web.id" target="_blank">websitesekolahgratis.web.id</a></li>
                        <li><a href="http://aditiaweb.com" target="_blank">aditiaweb.com</a></li>
                        <li><a href="http://antonsofyan.com" target="_blank">antonsofyan.com</a></li>
                    </ul>
                </div>
           </div>
       </div>
   </div>
</div> 