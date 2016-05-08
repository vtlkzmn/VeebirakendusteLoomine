
module.exports = {
  'Login Page: Kontrollime, et kõik oleks olemas!': function( _browser ) {
    _browser
      .url('http://cryptic-ravine-26647.herokuapp.com/addEstate')
      .waitForElementVisible( 'body', 1000 )
      .verify.visible( 'input[type=email]')
      .verify.visible( 'input[type=password]')
      .verify.visible( 'input[type=checkbox]')
      .verify.containsText( 'button[type=submit]', 'Login')
  },

  'Login Page: Proovime valede andmetega sisse logida!': function( _browser ) {
    var r = Math.random();
    _browser
      .setValue('input[type=email]', 'plahplah@mail.ee' )
      .setValue('input[type=password]', ''+r)
      .click('button[type=submit]')
      .pause(1000)
      .verify.containsText('.help-block', 'These credentials do not match our records.')
      .clearValue('input[type=email]')
      .clearValue('input[type=password]')
  },

  'Login Page: Logime sisse ja kontrollime, kas õnnestus!': function( _browser ) {
    _browser
      .setValue('input[type=email]', 'peeter123@mail.ee' )
      .setValue('input[type=password]', 'peeter123')
      .click('button[type=submit]')
      .pause(1000)
      .verify.containsText( '.dropdown-toggle','peeter123')
      .assert.elementNotPresent('input[type=email]')
      .assert.elementNotPresent('input[type=password]')
  },

  'Login Page: Logime välja ja kontrollime, kas õnnestus!': function( _browser ) {
    _browser
      .click('.dropdown-toggle')
      .pause(500)
      .verify.containsText( '.dropdown-menu','Logout')
      
      .verify.visible('.dropdown-menu a')
      .click('.dropdown-menu a')
      .pause(1000)
      .assert.elementPresent('#XML_stuff_here')
      .end();
  }

}
