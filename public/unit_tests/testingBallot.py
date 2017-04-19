#-------------------------------------------------------------------------------
# Name:        Unit Test - Test ballot information.
# Purpose:     Unit test opens a Firefox driver, log in, goes to the ballot page, clicks information links for candidates, then submits ballot.
#
# Author:      Stephanie Creamer
#
# Created:     01/08/2016
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
if "Electronic Vote System" in driver.title:
    print "Verified webpage's identity\n"
else:
    print "Web page's identity could not be verified\n"

#go to create an account
if driver.find_element_by_link_text('Log In').click():
    print "Found log in screen\n"
else:
    print "Could not find login screen\n"

#write correct account information
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="#addUser"]')))
driver.find_element_by_css_selector('#login').click()


#fill form
print "Logging in user\n"
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
if "Your identity has been verified!" in driver.page_source:
    print "Identity verified\n"
else:
    print "Identity verification message was not read\n"

#continuing on to ballot
driver.find_element_by_id("continue").click()
print "Going to ballot\n"

#check the more info for all the candidates
print "Clicking all information links to verify existance\n"
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="https://projectb-jnic1989.c9users.io/inhofe"]')))
if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/inhofe"]'):
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/inhofe"]').click()
    print "Found Inhofe's information\n"
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
else:
    print "Couldn't find Inhofe's information\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/nickles"]'):
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/nickles"]').click()
    print "Found Nickles's information\n"
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
else:
    print "Couldn't find Nickles's information\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/durbin"]'):
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/durbin"]').click()
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
    print "Found Durbin's information\n"
else:
    print "Couldn't find Durbin's information\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/fitzgerald"]'):
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/fitzgerald"]').click()
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
    print "Found Fitzgerald's information\n"
else:
    print "Couldn't find Fitzgerald's information\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/kohl"]'):
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/kohl"]').click()
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
    print "Found Kohl's information\n"
else:
    print "Couldn't find Kohl's information\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/feingold"]'):
    driver.find_element_by_tag_name('body').send_keys(Keys.ALT + Keys.F4)
    driver.find_element_by_xpath('//a[@href="https://projectb-jnic1989.c9users.io/feingold"]').click()
    print "Found Feingold's information\n"
else:
    print "Couldn't find Feingold's information\n"
driver.implicitly_wait(2)

#voting
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@value="Submit Candidates"]')))
if driver.find_element_by_xpath('//input[@value="James Inhofe"]'):
    driver.find_element_by_xpath('//input[@value="James Inhofe"]').click()
    print "Selected James Inhofe\n"
else:
    print "Could not select James Inhofe\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//input[@value="Peter Fitzgerald"]'):
    driver.find_element_by_xpath('//input[@value="Peter Fitzgerald"]').click()
    print "Selected Peter Fitzgerald\n"
else:
    print "Could not select Peter Fitzgerald\n"
driver.implicitly_wait(2)

if driver.find_element_by_xpath('//input[@value="Herbert Kohl"]'):
    driver.find_element_by_xpath('//input[@value="Herbert Kohl"]').click()
    print "Selected Herbert Kohl\n"
else:
    print "Could not select Herbert Kohl\n"

#submit vote
print "Submitting ballot\n"
driver.find_element_by_xpath('//input[@value="Submit Candidates"]').click()

#complete verification screen
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@name="submitcity"]')))
elem = driver.find_element_by_xpath('//input[@value="none"]')
elem.click()
print "City was not listed, selected none of the above\n"
print "Selected city, now submitting\n"
driver.find_element_by_name("submitcity").click()

#submitting ballot
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//input[@value="Submit Your Ballot"]')))
driver.find_element_by_xpath('//input[@value="Submit Your Ballot"]').click()

#logout
WebDriverWait(driver,30).until(EC.visibility_of_element_located((By.XPATH, '//a[@href="log_out.php"]')))
driver.find_element_by_xpath('//a[@href="log_out.php"]').click()

driver.quit()