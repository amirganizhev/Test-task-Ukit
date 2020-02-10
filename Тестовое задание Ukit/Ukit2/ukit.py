import re


def parse_input_data(input_data: list) -> dict:
    result = {'INVALID': 0}
    for i in input_data:
        city = re.search('([a-z0-9а-я|-]+\.)*[a-z0-9а-я|-]+\.[a-zа-я]+', i)
        if city:
            city = city.group(0)
            if city in result:
                result[city] += 1
            else:
                result[city] = 1
        else:
            result['INVALID'] += 1
    return result


if __name__ == '__main__':
    data = ['info@mail.ru', 'support@vk.com', 'ddd@rambler.ru', 'roxette@mail.ru', 'sdfsdf@@@@@rdfdf',
            'example@localhost', 'иван@иванов.рф', 'ivan@xn--c1ad6a.xn--p1ai', 'иван@иванов.рф',
            'сидоров@xn--80adbv1ag.xn--p1ai']
    result_dict = parse_input_data(data)
    for result_dict_element in sorted(result_dict, key=result_dict.get, reverse=True):
        print(result_dict_element, result_dict[result_dict_element])
