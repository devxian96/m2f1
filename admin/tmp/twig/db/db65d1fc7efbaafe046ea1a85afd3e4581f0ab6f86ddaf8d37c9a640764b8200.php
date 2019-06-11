<?php

/* database/designer/delete_relation_panel.twig */
class __TwigTemplate_a944a9eae334ce2b030a06d153fce9992173ea2a10a39af488b6a6719a126e58 extends Twig_Template
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
        echo "<table id=\"layer_upd_relation\" class=\"hide\" width=\"5%\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
        <tr>
            <td class=\"frams1\" width=\"10px\">
            </td>
            <td class=\"frams5\" width=\"99%\">
            </td>
            <td class=\"frams2\" width=\"10px\">
                <div class=\"bor\">
                </div>
            </td>
        </tr>
        <tr>
            <td class=\"frams8\">
            </td>
            <td class=\"input_tab\">
                <table width=\"100%\" class=\"center\" cellpadding=\"2\" cellspacing=\"0\">
                    <tr>
                        <td colspan=\"3\" class=\"center nowrap\">
                            <strong>
                                ";
        // line 21
        echo _gettext("Delete relationship");
        // line 22
        echo "                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" class=\"center nowrap\">
                            <input id=\"del_button\" name=\"Button\" type=\"button\"
                                class=\"butt\" value=\"";
        // line 28
        echo _gettext("Delete");
        echo "\" />
                            <input id=\"cancel_button\" type=\"button\" class=\"butt\"
                                name=\"Button\" value=\"";
        // line 30
        echo _gettext("Cancel");
        echo "\" />
                        </td>
                    </tr>
                </table>
            </td>
            <td class=\"frams6\">
            </td>
        </tr>
        <tr>
            <td class=\"frams4\">
                <div class=\"bor\">
                </div>
            </td>
            <td class=\"frams7\">
            </td>
            <td class=\"frams3\">
            </td>
        </tr>
    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "database/designer/delete_relation_panel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 30,  51 => 28,  43 => 22,  41 => 21,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "database/designer/delete_relation_panel.twig", "/workspace/research/admin/templates/database/designer/delete_relation_panel.twig");
    }
}
