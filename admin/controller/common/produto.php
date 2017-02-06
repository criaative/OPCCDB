<?php

class ControllerCommonProduto extends Controller {

    public function index() {
        $this->load->language('common/produto');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['heading_title'] = $this->language->get('heading_title');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_produto'),
            'href' => $this->url->link('common/produto', 'token='
                    . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('common/produto', 'token='
                    . $this->session->data['token'], true)
        );

        // Check install directory exists
        if (is_dir(dirname(DIR_APPLICATION) . '/install')) {
            $data['error_install'] = $this->language->get('error_install');
        } else {
            $data['error_install'] = '';
        }

        // Produto Extensions
        $produtos = array();

        $this->load->model('extension/extension');

        // Get a list of installed modules
        $extensions = $this->model_extension_extension->getInstalled('produto');

        // Add all the modules which have multiple settings for each module
        foreach ($extensions as $code) {
            if ($this->config->get('produto_' . $code . '_status') &&
                    $this->user->hasPermission('access', 'extension/produto/' . $code)) {
                $output = $this->load->controller('extension/produto/' . $code . '/produto');

                if ($output) {
                    $produtos[] = array(
                        'code' => $code,
                        'width' => $this->config->get('produto_' . $code . '_width'),
                        'sort_order' => $this->config->get('produto_' . $code . '_sort_order'),
                        'output' => $output
                    );
                }
            }
        }

        $sort_order = array();

        foreach ($produtos as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }

        array_multisort($sort_order, SORT_ASC, $produtos);

        // Split the array so the columns width is not more than 12 on each row.
        $width = 0;
        $column = array();
        $data['rows'] = array();

        foreach ($produtos as $produto) {
            $column[] = $produto;

            $width = ($width + $produto['width']);

            if ($width >= 12) {
                $data['rows'][] = $column;

                $width = 0;
                $column = array();
            }
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        // Run currency update
        if ($this->config->get('config_currency_auto')) {
            $this->load->model('localisation/currency');

            $this->model_localisation_currency->refresh();
        }

        $this->response->setOutput($this->load->view('common/produto', $data));
    }

}
