// owner login 

import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

# Create a new instance of the Chrome driver
driver = webdriver.Chrome()

# Open the web page
driver.get("http://localhost/aqarati/login.php")

# Find the email input element and enter the email
email_input = driver.find_element_by_id("email")
email_input.send_keys("hanan.alashqar1@gmail.com")

# Find the password input element and enter the password
password_input = driver.find_element_by_id("pwd")
password_input.send_keys("hanan123#")

# Submit the form
submit_button = driver.find_element_by_id("submit")
submit_button.click()

# Wait for the page to load
time.sleep(2)

# Check if the login was successful
if driver.current_url == "http://localhost/aqarati/owner/owner-index.php":
    print("Owner login test passed")
else:
    print("Owner login test failed")

# Close the browser
driver.quit()






//search 

import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

# Create a new instance of the Chrome driver
driver = webdriver.Chrome()

# Open the web page
driver.get("http://localhost/aqarati/search.php")

# Find the search input element and enter the search query
search_input = driver.find_element_by_name("search_property")
search_input.send_keys("villa")

# Submit the form
search_input.send_keys(Keys.RETURN)

# Wait for the page to load
time.sleep(2)

# Check if search results are displayed
if driver.find_elements_by_class_name("card"):
    print("Search page test passed")
else:
    print("Search page test failed")

# Close the browser
driver.quit()

