from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from webdriver_manager.chrome import ChromeDriverManager
import ctypes

# Set up Selenium WebDriver
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))

# Open the website
driver.get('https://www.thesparksfoundation.sg/')

# Define elements to check
elements_to_check = [
    {
        'name': 'Logo',
        'locator': (By.CSS_SELECTOR, '.navbar-brand')
    },
    {
        'name': 'Navigation Bar',
        'locator': (By.CSS_SELECTOR, '.navbar-nav')
    },
    {
        'name': 'Contact Us',
        'locator': (By.LINK_TEXT, 'Contact Us')
    },
     {
        'name': 'About Us',
        'locator': (By.LINK_TEXT, 'About Us')
    },
      {
        'name': 'Programs',
        'locator': (By.LINK_TEXT, 'Programs')
    },
       {
        'name': 'Service',
        'locator': (By.LINK_TEXT, 'Service')
    },
]

# Iterate over the elements to check
for element_info in elements_to_check:
    element_name = element_info['name']
    element_locator = element_info['locator']
    
    print(f'Checking {element_name}...')
    
    try:
        element = WebDriverWait(driver, 10).until(EC.visibility_of_element_located(element_locator))
        ctypes.windll.user32.MessageBoxW(0, f'{element_name} is available', 'Element Availability', 1)
        print(f'{element_name} is available')
    except:
        ctypes.windll.user32.MessageBoxW(0, f'{element_name} is not available', 'Element Availability', 1)
        print(f'{element_name} is not available')

    print('---')

# Close the browser
driver.quit()