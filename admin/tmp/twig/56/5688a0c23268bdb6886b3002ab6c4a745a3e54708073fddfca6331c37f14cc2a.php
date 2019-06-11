<?php

/* database/designer/page_save_as.twig */
class __TwigTemplate_19889f7316565c4d1c859d7edfb59541cc83df763f565a3e301cf56fb6ec5082 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<form action=\"db_designer.php\" method=\"post\" name=\"save_as_pages\" id=\"save_as_pages\" class=\"ajax\">
    ";
        // line 2
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
    <fieldset id=\"page_save_as_options\">
        <table>
            <tbody>
                <tr>
                    <td>
                        <input type=\"hidden\" name=\"operation\" value=\"savePage\" />
                        ";
        // line 9
        $this->loadTemplate("database/designer/page_selector.twig", "database/designer/page_save_as.twig", 9)->display(["pdfwork" =>         // line 10
($context["pdfwork"] ?? null), "pages" =>         // line 11
($context["pages"] ?? null)]);
        // line 13
        echo "                    </td>
                </tr>
                <tr>
                    <td>
                        ";
        // line 17
        echo PhpMyAdmin\Util::getRadioFields("save_page", ["same" => _gettext("Save to selected page"), "new" => _gettext("Create a page and save to it")], "same", true);
        // line 25
        echo "
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=\"selected_value\">";
        // line 30
        echo _gettext("New page name");
        echo "</label>
                        <input type=\"text\" name=\"selected_value\" id=\"selected_value\" />
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "database/designer/page_save_as.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 30,  44 => 25,  42 => 17,  36 => 13,  34 => 11,  33 => 10,  32 => 9,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "database/designer/page_save_as.twig", "/workspace/research/admin/templates/database/designer/page_save_as.twig");
    }
}
