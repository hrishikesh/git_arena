<?php if (!empty($commits)) { ?>
<ul class="commitsWrap">
    <?php foreach ($commits as $commit) { ?>
    <li class="clearfix">
        <div class="commitUser">
            <img src="<?php echo $commit['committer']['avatar_url']?>" alt="user default pic"/>
        </div>
        <div class="commitsDetails">
            <p><span><?php echo $commit['commit']['committer']['name'];?></span> has commited the code on branch <span>Master</span>
            </p>

            <div class="currentCommits">
                <span>Commit: </span>"<?php echo $commit['commit']['message'];?>"
            </div>
        </div>
        <div class="dateTimeWrap">
            <?php $date = date('d-m-Y = H:i A',strtotime($commit['commit']['committer']['date']));
                $arrDate = explode('=', $date);
            ?>
            <p><?php echo $arrDate[0];?></p>

            <p><?php echo $arrDate[1];?></p>
        </div>
    </li>
    <?php }?>
</ul>
<?php } ?>