from requests import get

class Puce:
    _base = ''
    _url = ''
    _test = []

    def __init__(self, key = ''):
        self._base = 'https://cosmox.ga/api/{}'.format(key)


    def account_create_test(self, name='', email='', password='', pin='', code=''):
        self._test = {'account_create': True}

        return self.account_create(name, email, password, pin, code)


    def account_create(self, name = '', email = '', password = '', pin = '', code = ''):
        self._url = '{}/account/create/{}/{}/{}/{}/{}'.format(self._base, name, email, password, pin, code)

        if 'account_create' in self._test:
            return self._url

        return self._curl()


    def account_change_test(self, name='', email='', password='', pin='', code=''):
        self._test = {'account_change': True}

        return self.account_change(name, email, password, pin, code)


    def account_change(self, name = '', email = '', password = '', pin = '', code = ''):
        self._url = '{}/account/change/{}/{}/{}/{}/{}'.format(self._base, name, email, password, pin, code)

        if 'account_change' in self._test:
            return self._url

        return self._curl()


    def account_change_name_test(self, name = ''):
        self._test = {'account_change_name': True}

        return self.account_change_name(name)


    def account_change_name(self, name = ''):
        self._url = '{}/account/change/name/{}'.format(self._base, name)

        if 'account_change_name' in self._test:
            return self._url

        return self._curl()


    def account_change_email_test(self, email = ''):
        self._test = {'account_change_email': True}

        return self.account_change_email(email)


    def account_change_email(self, email=''):
        self._url = '{}/account/change/email/{}'.format(self._base, email)

        if 'account_change_email' in self._test:
            return self._url

        return self._curl()


    def account_change_password_test(self, passowrd = ''):
        self._test = {'account_change_passowrd': True}

        return self.account_change_password(passowrd)


    def account_change_password(self, password = ''):
        self._url = '{}/account/change/password/{}'.format(self._base, password)

        if 'account_change_password' in self._test:
            return self._url

        return self._curl()


    def account_change_pin_test(self, pin = ''):
        self._test = {'account_change_pin': True}

        return self.account_change_pin(pin)


    def account_change_pin(self, pin = ''):
        self._url = '{}/account/change/pin/{}'.format(self._base, pin)

        if 'account_change_pin' in self._test:
            return self._url

        return self._curl()


    def account_change_code_test(self, code = ''):
        self._test = {'account_change_code': True}

        return self.account_change_code(code)


    def account_change_code(self, code = ''):
        self._url = '{}/account/change/code/{}'.format(self._base, code)

        if 'account_change_code' in self._test:
            return self._url

        return self._curl()


    def address_test(self, coin = '', url = ''):
        self._test = {'address': True}

        return self.address(coin, url)


    def address(self, coin = '', url = ''):
        self._url = '{}/address/{}/{}'.format(self._base, coin, url)

        if 'address' in self._test:
            return self._url

        return self._curl()


    def addresses_test(self, coin = ''):
        self._test = {'addresses': True}

        return self.addresses(coin)


    def addresses(self, coin = ''):
        self._url = '{}/addresses/{}'.format(self._base, coin)

        if 'addresses' in self._test:
            return self._url

        return self._curl()


    def altcoin_test(self, coin = ''):
        self._test = {'altcoin': True}

        return self.altcoin(coin)


    def altcoin(self, coin = ''):
        self._url = '{}/altcoin/{}'.format(self._base, coin)

        if 'altcoin' in self._test:
            return self._url

        return self._curl()


    def altcoins_test(self):
        self._test = {'altcoins': True}

        return self.altcoins()


    def altcoins(self):
        self._url = '{}/altcoins'.format(self._base)

        if 'altcoins' in self._test:
            return self._url

        return self._curl()


    def balance_test(self, coin = ''):
        self._test = {'balance': True}

        return self.balance(coin)


    def balance(self, coin = ''):
        self._url = '{}/balance/{}'.format(self._base, coin)

        if 'balance' in self._test:
            return self._url

        return self._curl()


    def balances_test(self):
        self._test = {'balances': True}

        return self.balances()


    def balances(self):
        self._url = '{}/balances'.format(self._base)

        if 'balances' in self._test:
            return self._url

        return self._curl()


    def _curl(self):
        response = get(self._url.replace(' ', '%20'))

        return response.text


    def deposits_test(self, coin_or_address = '', limit = 5):
        self._test = {'deposits': True}

        return self.deposits(coin_or_address, limit)


    def deposits(self, coin_or_address = '', limit = 5):
        self._url = '{}/deposits/{}/{}'.format(self.base, coin_or_address, limit)

        if 'deposits' in self._test:
            return self._url

        return  self._curl()


    def my_address_test(self, coin = ''):
        self._test = {'my_address': True}

        return self.my_address(coin)


    def my_address(self, coin = ''):
        self._url = '{}/myaddress/{}'.format(self._base, coin)

        if 'my_address' in self._test:
            return self._url

        return self._curl()


    def tx_test(self, tx = ''):
        self._test = {'tx': True}

        return self.tx(tx)


    def tx(self, tx = ''):
        self._url = '{}/tx/{}'.format(self._base, tx)

        if 'tx' in self._test:
            return self._url

        return self._curl()


    def withdrawal_test(self, coin = '', amount = '', address = '', pay_or_url = '', url = ''):
        self._test = {'withdrawal': True}

        return self.withdrawal(coin, amount, address, pay_or_url, url)


    def withdrawal(self, coin = '', amount = '', address = '', pay_or_url = '', url = ''):
        if '@' in address or pay_or_url == '':
            self._url = '{}/withdrawal/{}/{}/{}'.format(self._base, coin, amount, address)

        elif pay_or_url and url == '':
            self._url = '{}/withdrawal/{}/{}/{}/{}'.format(self._base, coin, amount, address, pay_or_url)

        elif url:
            self._url = '{}/withdrawal/{}/{}/{}/{}/{}'.format(self._base, coin, amount, address, pay_or_url, url)

        if 'withdrawal' in self._test:
            return self._url

        return self._curl()

    def withdrawals_test(self, coin_or_address = '', limit = 5):
        self._test = {'withdrawals': True}

        return  self.withdrawals(coin_or_address, limit)


    def withdrawals(self, coin_or_address = '', limit = 5):
        self._url = '{}/withdrawals/{}/{}'.format(self._base, coin_or_address, limit)

        if 'withdrawals' in self._test:
            return self._url

        return self._curl()
