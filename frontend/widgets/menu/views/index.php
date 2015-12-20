<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><?= $siteName ?></a>
    </div>


    <ul class="nav navbar-top-links navbar-right">
        <?php
        foreach ($topMenuItems as $menuItems) {
            ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa <?= $menuItems['iconClass'] ?> fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <?php
                    foreach ($menuItems['dropdownData'] as $dataItem) {
                        ?>
                        <li>
                            <a href="<?= $dataItem['link'] ?>" target="_blank">
                                <i class="fa <?= $dataItem['icon'] ?> fa-fw"></i>
                                <?= $dataItem['text'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php
                foreach ($leftMenu as $menuItems) {
                    ?>
                    <li>
                        <?php
                        $url = isset($menuItems['link']) ? $menuItems['link'] : '#';
                        $isDropdown = !isset($menuItems['link'])
                        ?>
                        <a href="<?= $url ?>">
                            <i class="fa <?= $menuItems['icon'] ?> fa-fw"></i> <?= $menuItems['text'] ?>
                            <?php echo $isDropdown ? '<span class="fa arrow"></span>' : '' ?>
                        </a>
                        <?php if ($isDropdown) { ?>
                            <ul class="nav nav-second-level">
                                <?php foreach ($menuItems['subMenuData'] as $subMenuItems) { ?>
                                    <li>
                                        <a href="<?= $subMenuItems['link'] ?>"><?= $subMenuItems['text'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>