#-------------------------------------------------------------------------------
# Name:        Unit Test - Test user log in.
# Purpose:     Unit test opens a Firefox browser, attempts to log in with erroneous credentials, logs in with proper credentials, then logs out.
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

#go to home page make sure it's the right site
driver.get("https://cs361-project-database-santokis808.c9users.io/index.php")
assert "Electronic Vote System" in driver.title

#go to create an account
driver.find_element_by_link_text('Log In').click()

#write incorrect account information
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="#addUser"]')))
driver.find_element_by_css_selector('#login').click()


#fill form
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="username_login"]')))
element = driver.find_element_by_id("username_login")
element.send_keys("testacct")
element = driver.find_element_by_id("password_login")
element.send_keys("wrongpassword")
element = driver.find_element_by_id("ssn_login")
element.send_keys("555-55-5555")

#submit form, verify the registration was rejected
driver.find_element_by_id("addPatronButton").click()
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="tryagain"]')))
assert "Your credentials do not match our records." in driver.page_source

#go back to log in screen
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="tryagain"]')))
driver.find_element_by_id("tryagain").click()

#write correct account information
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="#addUser"]')))
driver.find_element_by_css_selector('#login').click()


#fill form
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="username_login"]')))
element = driver.find_element_by_id("username_login")
element.send_keys("testacct")
element = driver.find_element_by_id("password_login")
element.send_keys("password")
element = driver.find_element_by_id("ssn_login")
element.send_keys("555-55-5555")

#correct log in
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@type="submit"]')))
driver.find_element_by_id("addPatronButton").click()
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@id="continue"]')))
assert "Your identity has been verified!" in driver.page_source

#continuing on to ballot
driver.find_element_by_id("continue").click()

#logout
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="log_out.php"]')))
driver.find_element_by_xpath('//a[@href="log_out.php"]').click()

driver.quit()