<!DOCTYPE HTML>
<?php //phpinfo(); 
session_start();

?>
<html lang="en">
    <head>

        <link rel='stylesheet' href='normalize.css'>
        <link rel='stylesheet' href='beer.css'>
        <title>Kelowna Beer Club</title>
    </head>

    <body>
        <header>
            <?php 
            include 'headerFiller.php';
            fillheader();
            ?>
        </header>

        <Main class="tblock">
            <h1>Kelowna</h1>
            <p>Kelowna is home to many excellent microbreweries, cideries and distilleries. Many tourists and locals enjoy what the Okanagan 
                has to offer with our beautiful natural scenery and many local flavours produced with a passion for hand-crafted beverages. In 
                sit-down tasting rooms, people can try tank-to-tap craft beer and learn how a small batch microbrewery creates their selection of 
                rich beer using only purified water, hops, barley malt, and yeast.<br /> <br />

                Local cideries are deeply rooted in the local agricultural history. Discover this crisp local beverage and learn about the process 
                of taking the juices of local fruit and transforming it through fermentation into tasty cider. Experience first-hand the art of 
                craft distilling and enjoy the opportunity to try a unique selection of flavourful and award-winning spirits made from local 
                fruit.
            </p>
            <h1>Kelowna Breweries</h1><br><br>
            <h3>Tree Brewery</h3>
            <p>Created in 1996, they started the TASTE REVOLUTION for Craft beer in Kelowna. 
                They hit the streets and sampled customers with kegs from the back of their delivery truck. 
                Some of their most popular beers include:</p>
            <ul>
                <li>HopHead IPA</li>
                <li>Vertical Winter Ale</li>
                <li>Blue Bird Lager</li>
                <li>Copper Ale</li>
                <li>Milk Stout</li><br><br>
            </ul>

            <h3>Millcreek Brewing</h3>
            <p>Established in Kelowna in 2001 and attached to Mccurdy Bowling center and Freddys Brew Pub. They are proud 
                to offer our community with fresh craft beer, delicious and affordable food, and a great family fun activity 
                we like to call bowling. We thank everyone for your long lasting support and can't wait to have you back for another visit.</p>
            <p>Beer list:</p>
            <ul>
                <li>Lebowski Lager</li>
                <li>HarkRider Red</li>
                <li>Channel Cat Pale Ale</li>
                <li>Sandbagger Brown</li>
            </ul>

            ​<h3>Big Surf Brewing</h3>
            <p>A craft brewery that is proud to be from Kelowna, in the centre of the sun-soaked Okanagan Valley. Starting with their
                award-winning Brewmaster, Wolfgang Hoess, they believe that beer is more than just a product – it is their passion – and this 
                passion is the driving force behind Big Surf.<br>
                This enthusiasm for beer has inspired us to dedicate ourselves to the creation of a quality brew for the right price, so more 
                people can share our obsession. We know quality doesn't have to translate into high costs – it just takes hard work, experience 
                and a genuine love for what we do. This is our recipe for creating a great tasting and absolutely affordable beer.</p>

        </Main>

        <footer><p>Copyright &copy; CK technologies</p>
        </footer>
    </body>
</html>
