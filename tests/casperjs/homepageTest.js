// basic tests for a basic site...

var url = 'http://www.gov.dev/';
var siteName = 'Home - www.gov.au';

casper.test.comment('Starting Testing');

casper.start(url, function() {

    // Double check the URL we're testing is right
    this.test.assert(
        this.getCurrentUrl() === url, 'url is the one expected'
    );

    this.test.assertHttpStatus(200, siteName + ' is up');

    // Check the page title
    this.test.assertTitle(
        siteName,
        siteName + ' has the correct title'
    );

    // Check footer div showed up (therefore likely no errors)
    this.test.assertExists(
        'footer.footer',
        siteName + ' has footer"'
    );

    // Check banner text is showing
    this.test.assertTextExists(
        'A listing of websites for governments in Australia',
        'page body contains "A listing of websites for governments in Australia"'
    );
});

casper.test.comment('Ending Testing');
casper.test.comment('');

// casper.run(function() {
//     // this.test.done(16);
//     this.echo('Done.');
//     // require('utils').dump(casper.test.getFailures());
//     // require('utils').dump(casper.test.getPasses());
//     this.exit();
// });

casper.run(function() {
  this.test.done();
});



/**
* homepage.js - Homepage tests.
*/

// casper.test.begin('Tests homepage structure', 7, function suite(test) {
//
//   casper.start(url, function() {
//     Verify that the main menu links are present.
//     test.assert(
//       getCurrentUrl() === url, 'url is the one expected'
//     );
//
//     test.assertHttpStatus(200, siteName + ' is up');
//
//     test.assertTitle(
//       'Real User Monitoring, End User Experience Monitoring : New Relic',
//       siteName + ' has the correct title'
//     );
//
//     test.assertExists(
//       'div[class="footer"]',
//       siteName + ' has a footer div"'
//     );
//
//     test.assertTextExists(
//       'A listing of websites for governments in Australia', 'page body contains "A listing of websites for governments in Australia"'
//     );
//
//     // 10 articles should be listed.
//     // test.assertElementCount('article', 10, '10 articles are listed.');
//   });
//
//
//   casper.test.comment('Ending Testing');
//
//   casper.run(function() {
//     test.done();
//   });
// });
