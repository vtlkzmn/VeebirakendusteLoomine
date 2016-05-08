
module.exports = {
  'Registreerimine: Läheme register lehele, täidame väljad, submit, logime välja, kontrollime logimist': function( _browser ) {
    var pass = "testing1";
    var r1 = Math.round(Math.random()*1000);
    var r2 = Math.round(Math.random()*1000);
    // random on, et saaks luua uusi kasutajaid.
    var email = r1 + "email" + r2 + "@gmail.com";
    var name =  r1 + "name" + r2;

    _browser
      // läheme registreerima
      .url('http://cryptic-ravine-26647.herokuapp.com/addEstate')
      .waitForElementVisible( 'body', 1000 )
      .verify.visible( 'a[href="/register"]')
      .click( 'a[href="/register"]')
      // täidame väljad
      .setValue('input[name="name"]', name )
      .setValue('input[name="email"]', email )
      .setValue('input[name="password"]', pass )
      .setValue('input[name="password_confirmation"]', pass)
      .click('button[type=submit]')
      .pause(1000)
      // peame välja logima, sest ta logis meid sisse
      .url('http://cryptic-ravine-26647.herokuapp.com/addEstate')
      .click('.dropdown-toggle')
      .pause(500)
      .verify.containsText( '.dropdown-menu','Logout')
      .verify.visible('.dropdown-menu a')
      .click('.dropdown-menu a')
      .pause(1000)
      // logime sisse
      .url('http://cryptic-ravine-26647.herokuapp.com/addEstate')
      .setValue('input[type=email]', email )
      .setValue('input[type=password]', pass)
      .click('button[type=submit]')
      .pause(1000)
      .verify.containsText( '.dropdown-toggle',name)
      .assert.elementNotPresent('input[type=email]')
      .assert.elementNotPresent('input[type=password]')
      .end();
  }
}
