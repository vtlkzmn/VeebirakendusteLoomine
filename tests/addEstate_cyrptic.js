
module.exports = {

  'Add Estate: Login, Täidame väljad, submit, logout ja kontrollime!': function( _browser ) {
    var a = Math.random();
    _browser
      //login
      .url('http://cryptic-ravine-26647.herokuapp.com/addEstate')
      .setValue('input[type=email]', 'peeter123@mail.ee' )
      .setValue('input[type=password]', 'peeter123')
      .click('button[type=submit]')
      .pause(1000)
      // täidame väljad
      .setValue('#address-offline', 'Automaatne testimine subject ' + a )  
      .setValue('#description-offline', 'Automaatne testimine description ' + a )
      .click("#addEstate-button")
      .pause(1000)

      // logime välja
      .click('.dropdown-toggle')
      .pause(500)
      .verify.containsText( '.dropdown-menu','Logout')
      .verify.visible('.dropdown-menu a')
      .click('.dropdown-menu a')
      .pause(2000) // igaks juhuks kauem
      .assert.elementPresent('#XML_stuff_here')

      // kontrollime data
      .verify.containsText('#getLatestEstate', 'Automaatne testimine subject ' + a)
      .verify.containsText('#getLatestEstate', 'Automaatne testimine description ' + a)
      .end();
  }

  // siin saaks ka kontrollida erroreid

}
