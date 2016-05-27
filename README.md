# StrengthTracking

After strstd.com went down, there wasn't anything to track workouts and strength progres...
So I decided to make my own

It uses
- Python flask to build a RESTful backend
- MySQL for the DB
- AngularJS for the front

### Gettting started 
- If you want to develop locally, you should make sure that you have virutalbox and vagrant installed
- Clone the repo, and run 'vagrant up'
- That will take a few minutes - afterwards, run 'vagrant ssh'
- Now you're in the virtual machine.  cd to '/vagrant' to see the mapped files
- cd into 'app/' and run python app.py to start the local webserver
- navigate to localhost:4000


### File structure overview
```

├── app # Larger python application
│   ├── controllers # Controllers for backend API
│   ├── static
│   │   ├── css
│   │   ├── images
│   │   └── js
│   │       └── app # Angular.JS application
│   │           ├── controllers # Controllers for frontend
│   │           ├── factories # Tools to get data from backend more easily
│   │           └── partials # Templates for rendering the frontend
├── sql
├── tests
└── venv
    ├── lots of things....


```

