import unittest
import requests
from bs4 import BeautifulSoup
from selenium import webdriver

class ATestCase(_Shared, unittest.TestCase):

    def assert_id_present(self, soup, id_str):
        objs = soup.find_all(id=id_str)
        self.assertTrue(objs)

    def test_404(self):
        r = requests.get(self.url)
        self.assertEqual(r.status_code, 404)

if __name__ == "__main__":
    unittest.main()