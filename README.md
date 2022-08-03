# Exercise: Create a SQL Database, Load Data and Verify Values.

In this exercise you will use create a series of objects in Ansible controller that reference an existing playbook that will connect to a VM and install a SQL Server Database, load some sample data, and deploy an example container with a php web app that will connect to the database and display some of the data in a table in a website.

## Step 1: Connect to the Ansible Controller

Using the link provided in the workshop to the Automation Controller.  Login using the admin user with the password provided.

![Controller Login](/images/ControllerLogin.png)

## Step 2: Add a New Project

Click the Projects section from the selection bar along the left side of the screen and then click Add.

![Add Project](/images/AddProject.png)

Fill in the fields shown in the image below.  
 - To select the Execution Environment, click the **Search** icon and choose the *rhel workshop execution environment*.  
 - Select **Git** as the *Source Control Credential Type* from the dropdown.  
 - Then paste the following in the *Source Control URL* field.

https://github.com/Red-Hat-Energy-Ansible-Playbooks/mssql-demo

![Project Details](/images/ProjectDetails.png)

Click Save

The Controller will run a Job that downloads the project.  Wait for the **Last Job Status** to show *Successful*. 

![Project Status](/images/ProjectRefresh.png)

## Step 3: Create Template for Playbook

From the selection bar along the left side of the screen, click *Templates*.  From the **Add** drop down, select *Add Job Template*.

![Create Template](/images/CreateTemplate.png)

Fill in the fields from the image. 
 - For **Inventory**, click the *Search* icon and select *Workshop Inventory*.
 - Select the *mssql-demo*  for the **Project** by clicking the *Search* icon.
 - From the **Playbook** dropdown, choose the *playbook.yml* file.
 - Click the *Search* icon under **Credentials** and choose the *Workshop Credential* from the **Machine Type** category.

![Create Template 1](/images/JobTemplate1.png)

In the **Variables** section, add the following lines:

```
sa_password: "Password for SA User"
inventory_host: ansible-1
sql_host: "localhost"
sql_port: 1443
git_branch: main
```

![Create Template 2](/images/JobTemplate2.png)

Replace the *Password for SA User* with a value for a password you want to use (10 Characters).

Click Save at the bottom of the form.


## Step 4: Launch the Template to Execute the Playbook

From the newly created template, click **Launch**.

A window will launch that will tail the log of the *Job* as it runs.

