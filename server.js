require ('dotenv').config ();
const express = require ('express');
const path = require ('path');
const PORT = process.env.PORT || 5163;
const {Pool} = require ('pg');

const pool = new Pool ({
  connectionString: process.env.DATABASE_URL,
  ssl: {
    rejectUnauthorized: false,
  },
});

express ()
  .use (express.static (path.join (__dirname, 'public')))
  .use (express.json ())
  .use (express.urlencoded ({extended: true})) // <-- This line should come before route definitions
  .set ('views', path.join (__dirname, 'views'))
  .set ('view engine', 'ejs')
   .get('/', async (req, res) => {
    try {
      res.render('pages/index');
    } catch (err) {
      console.error(err);
      res.set({
        'Content-Type': 'application/json',
      });
      res.json({
        error: err,
      });
    }
  })
  .get('/index', async (req, res) => {
    res.render ('pages/index');
  })
  
  .get('/uaQuiz', async (req, res) => {
    res.render ('pages/uaQuiz');
  })
  
  .get('/stars', async (req, res) => {
    res.render ('pages/stars');
  })
  
  .get('/makeAccounts', async (req, res) => {
    res.render ('pages/makeAccounts');
  })

  .get('/planets', async (req, res) => {
    res.render ('pages/planets');
  })
  
  .get('/about', async (req, res) => {
    res.render ('pages/about');
  })
  
  .get('/login', async (req, res) => {
    try {
      // Render the initial login page
      res.render('pages/login');
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Failed to render login page' });
    }
    })
  
  .post('/login', async (req, res) => {
  res.set({
    'Content-Type': 'application/json',
  });

  const { email, passWord } = req.body;
    console.log(email + " " + passWord);
    lowercaseEmail = email.toLowerCase ();

  try {
    const client = await pool.connect();

    const result = await client.query(
      'SELECT email, pword FROM users WHERE email = $1',
      [lowercaseEmail]
    );

    console.log(result);

    if (result.rows.length == 0) {
      // User not found
      res.status(401).json({ error: 'Invalid email or password' });
      client.release();
      return;
    }

    const storedPassword = result.rows[0].pword;

    // Compare the stored password with the provided password
    if (passWord === storedPassword) {
      // Passwords match, user is authenticated
      // Redirect to the userAccess page
      res.redirect('/userAccess');
    } else {
      // Passwords don't match
      res.status(401).json({ error: 'Invalid email or password' });
    }

    client.release();
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Failed to authenticate user' });
  }
  })
  
.post('/makeAccounts', async (req, res) => {
  res.set({
    'Content-Type': 'application/json',
  });

  const { email, password, confirm_password } = req.body;
  console.log(email + " " + password + " " + confirm_password);

  // Check if password and confirm password match
  if (password !== confirm_password) {
    res.status(400).json({ error: 'Password and confirm password do not match' });
    return;
  }

  // Convert email to lowercase for case-insensitive comparison
  const lowercaseEmail = email.toLowerCase();

  try {
    const client = await pool.connect();

    // Check if the email is already in use
    const existingUser = await client.query(
      'SELECT email FROM users WHERE email = $1',
      [lowercaseEmail]
    );

    if (existingUser.rows.length > 0) {
      // Email is already in use
      res.status(400).json({ error: 'Email is already in use' });
      client.release();
      return;
    }

    // If email is not in use, insert the new user into the database
    const result = await client.query(
      'INSERT INTO users(email, pword) VALUES($1, $2) RETURNING *',
      [lowercaseEmail, password]
    );

    console.log(result);
    
    client.release();

    // Redirect to the userAccess page or send a success response
    res.redirect ('/userAccess');

  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Failed to create account' });
  }
})
  .get('/userAccess', async (req, res) => {
    res.render ('pages/userAccess');
  })

  .get('/planets/:name', (req, res) => {
    const planetName = req.params.name;
    res.render(`pages/planets/${planetName.toLowerCase()}`);
  })

  .listen (PORT, () => console.log (`Listening on ${PORT}`));
