<div class="mainContent">
    <div class="row upperContent">
        <div class="span8">
            <div class="dashboardUserWrap clearfix">
                <div class="userMainIcon">
                    <img src="<?php echo $avatarUrl; ?>" alt="User Pictures">
                </div>

                <div class="userInformation">
                    <p><?php echo $userName;?></p>

                    <!--<p>Email id</p>-->
                </div>
            </div>
            <div class="tabWrap">
                <ul class="clearfix">
                    <li><a href="#tabTable" class="activeTab">Activity Feeds</a></li>
                    <li><a href="#tabGraph">Graph Representation</a></li>
                </ul>
            </div>
            <div class="lowerTabContent">
                <div class="tabContent" id="tabTable">
                    <div id="activityList">
                        <?php if (!empty($commits)) { ?>
                        <ul class="commitsWrap">
                            <?php foreach ($commits as $commit) { ?>
                            <li class="clearfix">
                                <div class="commitUser">
                                    <img src="<?php echo $commit['committer']['avatar_url']?>" alt="user default pic"/>
                                </div>
                                <div class="commitsDetails">
                                    <p><span><?php echo $commit['commit']['committer']['name'];?></span> has commited
                                        the code on branch <span>Master</span>
                                    </p>

                                    <div class="currentCommits">
                                        <span>Commit: </span>"<?php echo $commit['commit']['message'];?>"
                                    </div>
                                </div>
                                <div class="dateTimeWrap">
                                    <?php $date = date('d-m-Y = H:i A',
                                    strtotime($commit['commit']['committer']['date']));
                                    $arrDate    = explode('=', $date);
                                    ?>
                                    <p><?php echo $arrDate[0];?></p>

                                    <p><?php echo $arrDate[1];?></p>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="tabContent hide" id="tabGraph">
                    <div class="teamBtnWrap clearfix">
                        <?php if (!empty($repos)) {
                        foreach ($repos as $key => $repo) {
                            ?>
                            <div class="teamBtn active"><?php echo $repo['name'];?></div>
                            <?php
                        }
                    }?>
                    </div>
                    <div class="chartsWrap" id="detailChart">

                    </div>
                </div>
            </div>
        </div>
        <div class="feedsWrap">
            <h3>See Recent Activities</h3>
            <?php echo $this->element('repository_list');?>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $('.recentFeeds').click(function () {
            var repoName = $(this).attr('repo-name');
            var ownerName = $(this).attr('owner-name');
            $.ajax({

                url:'<?php echo FULL_BASE_URL;?>/repositories/activity_feeds',
                type:'get',
                data:{repoName:repoName, ownerName:ownerName},
                success:function (data, status) {
                    $('#activityList').html(data);
                },
                error:function (xhr, desc, err) {
                }
            });

            $.ajax({

                url:'<?php echo FULL_BASE_URL;?>/repositories/contributors_list',
                type:'get',
                data:{repoName:repoName, ownerName:ownerName},
                success:function (data, status) {
                    $('#drop_'+repoName).html(data);
                },
                error:function (xhr, desc, err) {
                }
            });
        });

    });
</script>
