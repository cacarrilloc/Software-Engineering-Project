#-------------------------------------------------------------------------------
# Name:        Unit Test - Create a user
# Purpose:     Unit test for site; creates a user and exits upon success.
#
# Author:      Stephanie Creamer
#
# Created:     28/07/2016
# Notes:       Marionette, a webdriver for Firefox, is needed to run this script
#              Download and instructions for installing are here: https://developer.mozilla.org/en-US/docs/Mozilla/QA/Marionette/WebDriver
#-------------------------------------------------------------------------------

from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait
caps = DesiredCapabilities.FIREFOX
caps["marionette"] = True

driver = webdriver.Firefox(capabilities=caps)


#driver = webdriver.Chrome()

#go to home page make sure it's the right site
driver.get("https://cs361-project-database-santokis808.c9users.io/index.php")
assert "Electronic Vote System" in driver.title

#go to create an account
driver.find_element_by_link_text('Create Account').click()

#write new account information
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="#addUser"]')))
assert "CREATE YOUR ACCOUNT" in driver.page_source
driver.find_element_by_css_selector('#createButton').click()

#fill form
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="firstName"]')))
#element = driver.find_element_by_id("firstName")
element = driver.find_element_by_xpath('//input[@id="firstName"]')
element.send_keys("Test")
element = driver.find_element_by_id("lastName")
element.send_keys("Account")
element = driver.find_element_by_id("ssn")
element.send_keys("555-55-5555")
element = driver.find_element_by_id("DOB")
element.send_keys("01011960")
element = driver.find_element_by_id("party")
element.send_keys("Green")
element = driver.find_element_by_id("userStreet")
element.send_keys("123 Test Street")
element = driver.find_element_by_id("userCity")
element.send_keys("Testville")
element = driver.find_element_by_id("userState")
element.send_keys("CA")
element = driver.find_element_by_id("userZip")
element.send_keys("99999")
element = driver.find_element_by_id("userPhone")
element.send_keys("415-555-5555")
element = driver.find_element_by_id("username")
element.send_keys("testacct")
element = driver.find_element_by_id("password")
element.send_keys("password")

#submit form
driver.find_element_by_id("adduserButton").click()
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="ballotPage"]')))
assert "Your registration has been successfully completed!!" in driver.page_source

driver.quit()