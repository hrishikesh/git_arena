<div class="activeFeeds">
    <div class="listMainWrap">
        <?php
        if (!empty($repos)) {
            ?>
            <ul>
                <?php foreach ($repos as $key => $repo) {
                $class = '';
                if ($key == 0) {
                    $class = 'openList';
                }
                ?>
                <li>
                    <div class="recentFeeds clearfix <?php echo $class;?>"
                         repo-name="<?php echo $repo['name'];?>" owner-name="<?php echo $repo['owner']['login'];?>">
                        <p><?php echo $repo['name'];?></p>
                        <i class="iconRepresent"></i>
                    </div>
                    <ul class="dropDownList" id="drop_<?php echo $repo['name'];?>">
                        <?php
                        if (!empty($contributors) && $key==0) {
                            foreach ($contributors as $contributor) {
                                ?>
                                <li><?php echo $contributor['login'];?></li>
                                <?php
                            }
                        } else {
                            echo "<li>No Users</li>";
                        }
                        ?>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <?php

        }
        ?>
    </div>
</div>