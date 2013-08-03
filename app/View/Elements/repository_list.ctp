<div class="activeFeeds">
    <div class="listMainWrap">
        <?php
        if (!empty($repos['repositories'])) {
            ?>
            <ul>
                <?php foreach ($repos['repositories'] as $key => $repo) {
                $class = '';
                if ($key == 0) {
                    $class = 'openList';
                }
                ?>
                <li>
                    <div class="recentFeeds clearfix <?php echo $class;?>"
                         data-name="<?php echo $repo['name'];?>">
                        <p><?php echo $repo['name'];?></p>
                        <i class="iconRepresent"></i>
                    </div>
                    <ul class="dropDownList">
                        <li>Anamika Verma</li>
                        <li>Vijay Kumbhkar</li>
                        <li>Vikas Singh</li>
                        <li>Harshal Shinde</li>
                        <li>Hrishikesh Ravekar</li>
                        <li>Pankaj Khernar</li>
                        <li>Pavan Avinash</li>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <?php

        }
        ?>
    </div>
</div>