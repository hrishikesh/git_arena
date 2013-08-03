<div class="mainContent">
    <div class="row upperContent">
        <div class="span8">
            <div class="dashboardUserWrap clearfix">
                <img src="/app/webroot/img/default-pic.png" alt="User Pictures">

                <div class="userInformation">
                    <p>Name</p>

                    <p>Email id</p>
                </div>
            </div>
            <div class="tabWrap">
                <ul class="clearfix">
                    <li><a href="javascript: void(0)">Activity Feeds</a></li>
                    <li><a href="javascript: void(0)">Graph Representation</a></li>
                </ul>
            </div>

        </div>
        <div class="feedsWrap">
            <h3>See Recent Activities</h3>

            <div class="activeFeeds">
                <div class="listMainWrap">
                    <?php
                    if (!empty($repos['repositories'])) {
                        ?>
                        <ul>
                            <?php foreach ($repos['repositories'] as $key => $repo) {
                            ?>
                            <li>
                                <div class="recentFeeds"
                                     data-name="<?php echo $repo['name'];?>">
                                    <?php echo $repo['name'];?>
                                </div>
                            </li>
                            <?php }?>

                        </ul>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="lowerTabContent">
        <div class="tabContent" id="tabTable">

        </div>
        <div class="tabContent" id="tabGraph">

        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        //on change of no.of responses chosen
        $('.recentFeeds').click(function () {
            var repoName = $(this).attr('data-name');
            alert(repoName);
            $.ajax({

                url:'<?php echo FULL_BASE_URL;?>/repositories/activity_feeds',
                type:'get',
                data:{repoName:repoName},
                success:function (data, status) {
                    $('#responseList').html(data);
                },
                error:function (xhr, desc, err) {
//                        console.log(xhr);
//                        console.log("Desc: " + desc + "\nErr:" + err);
                }
            });

        });

    });
</script>
