<?php
include_once("backend/config/config.php");
include_once("backend/helpers/Format.php");
include_once("backend/classes/Category.php");
include_once("backend/classes/Subcategory.php");
include_once("backend/classes/Product.php");
$categoryObj = new Category();
$subcategoryObj = new Subcategory();
$productObj = new Product();
if(Format::getCategoryFromURL() == "home" ){
    $title = "Home | Prisma Designs";
    $description = "Home | Prisma Designs";
    include_once("home.php");
}
elseif(Format::getCategoryFromURL() == "about" ){
    $title = "About | Prisma Designs";
    $description = "About | Prisma Designs";
    include_once("about.php");
}
elseif(Format::getCategoryFromURL() == "services" ){
    $title = "Services | Prisma Designs";
    $description = "Services | Prisma Designs";
    include_once("services.php");
}
elseif(Format::getCategoryFromURL() == "contact" ){
    $title = "Contact | Prisma Designs";
    $description = "Contact | Prisma Designs";
    include_once("contact.php");
}
elseif(Format::getCategoryFromURL() == "error" ){
    $title = "Page Not Found! Error 404.";
    $description = "Page Not Found! Error 404.";
    include_once("404.php");
}
else if(!Format::getSubCategoryFromURL() && Format::getCategoryFromURL()){
    $category = Format::getCategoryFromURL();
    $pageCategory = $categoryObj->getCategoryBySlug($category);
    if($pageCategory){
        $title = $pageCategory['title'];
        $description = $pageCategory['description'];
        include_once('category.php');
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITE_PATH?>/error"
        </script>
        <?php
        die();
    }
}
else if(!Format::getProfileFromURL() && Format::getSubCategoryFromURL()  && Format::getCategoryFromURL() ){
    $category = Format::getCategoryFromURL();
    $subCategory = Format::getSubCategoryFromURL();
    $pageCategory = $categoryObj->getCategoryBySlug($category);
    if($pageCategory){
        // $pageCategory = mysqli_fetch_array($pageCategory);
        $pageSubcategory = $subcategoryObj->getSubcatBySlugAndCatId($subCategory,$pageCategory['id']);
        if($pageSubcategory){
            $title = $pageSubcategory['title'];
            $description = $pageSubcategory['description'];
            include_once('category.php');
            
        }
        else{
            ?>
            <script>
                window.location.href = "<?php echo SITE_PATH?>/error"
                </script>
            <?php
            die();
        }
        
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITE_PATH?>/error"
        </script>
        <?php
        die();
    }
}

else{
    $title = "Page Not Found! Error 404.";
    $description = "Page Not Found! Error 404.";
    include_once("404.php");
}
?>