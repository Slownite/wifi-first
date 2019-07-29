#!/usr/bin/python3

# from __future__ import print_function
import mechanicalsoup

# Config  - should be put in a separate config file later
username = "a@wifi.com"
password = "12345abc"
URL = "https://selfcare.wifirst.net/sessions/new"


def main():
    browser = mechanicalsoup.StatefulBrowser(
        soup_config={'features': 'lxml'},
        raise_on_404=True,
        user_agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 \
        (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7",
    )
    # more verbose output:
    browser.set_verbose(2)

    browser.open(URL)
    # print(URL.title.text)     # for debugging

    # browser.select_form('form[action="/sessions/"]')
    form = browser.select_form()
    form.set("login", username)
    form.set("password", password)
    browser.submit_selected()

    browser.launch_browser()  # for debugging
    source_code = browser.get_current_page()
    print(source_code)  # deb


if __name__ == "__main__":
    main()
